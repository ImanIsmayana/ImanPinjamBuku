<?php

namespace App\Http\Controllers;

use App\Models\member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = member::latest()->paginate(100);

        return view('members.index', compact('members'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        member::create($request->all());

        return redirect()->route('members.index')
            ->with('success', 'Member created successfully.');
    }

    public function show(member $member)
    {
        return view('members.show', compact('member'));
    }

    public function edit(member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, member $member)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $member->update($request->all());

        return redirect()->route('members.index')
            ->with('success', 'Member updated successfully');
    }
    
    public function destroy(member $member)
    {
        $member->delete();

        return redirect()->route('members.index')
            ->with('success', 'Member deleted successfully');
    }
}
