<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\category;
use App\Models\category_book;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facade as Debugbar;

class BookController extends Controller
{

    public function index()
    {

        $books = book::latest()->paginate(100);

        return view('books.index', compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }

    public function create()
    {

        return view('books.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required'
        ]);
        
        Debugbar::info($request);

        book::create($request->all());

        foreach ($request->get('category') as $category) {
            $category_book = new category_book([
                'book_id' => $request->get('id'),
                'category_id' => $category
            ]);
            $category_book->save();
        }
        

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    public function show(book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, book $book)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully');
    }
    
    public function destroy(book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully');
    }
}
