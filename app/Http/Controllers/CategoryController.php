<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = category::latest()->paginate(100);

        return view('categories.index', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function show(category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, category $category)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully');
    }
    
    public function destroy(category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
