<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\borrowing;
use App\Models\member;
use App\Models\book;
use App\Models\category_book;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{

    public function index()
    {
        $borrowings = borrowing::latest()->where('status', '=', 1)->paginate(100);

        return view('borrowings.index', compact('borrowings'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }

    public function allborrow()
    {
        
        $allborrower = borrowing::where('status', '=', 2)->get();

        return response()->json($allborrower);
    }

    public function storeBorrowingStatus($borrowing)
    {

        $borrowingstatus = borrowing::find($borrowing);
        $borrowingstatus->status = 2;
        
        $borrowingstatus->save();
       
        return json_encode(array('statusCode'=>200));

    }

    public function storeBorrowingStatusLate($borrowing)
    {

        $borrowingstatus = borrowing::find($borrowing);
        $borrowingstatus->status = 3;
        
        $borrowingstatus->save();
       
        return json_encode(array('statusCode'=>200));

    }

    public function membername($member)
    {
        
        $member_name = DB::table('members')->where('id', '=', $member)->get();

        return response()->json($member_name);
    }

    public function bookname($book)
    {
        
        $book_name = DB::table('books')->where('id', '=', $book)->get();

        return response()->json($book_name);
    }

    public function returndate($id)
    {
        
        $return_date = DB::table('borrowings')->where('id', '=', $id)->get();

        return response()->json($return_date);
    }

    public function bookcategory($book_id)
    {

        $bookcategory = category_book::join('books', 'books.id', '=', 'category_book.book_id')
              ->join('categories', 'categories.id', '=', 'category_book.category_id')
              ->where('book_id', '=', $book_id)
              ->get(['categories.*', 'categories.name']);

        return response()->json($bookcategory);
    }

    public function create()
    {
        return view('borrowings.create');
    }

    public function store(Request $request)
    {

        borrowing::create($request->all());

        $request->validate([
            'member_id' => 'required',
            'book_id' => 'required',
            'return_date' => 'required',
            'created_at_borrow' => 'required'
        ]);

        return redirect()->route('borrowings.index')
            ->with('success', 'new borrowing book successfully.');
    }

    public function show(borrowing $borrowing)
    {
        return view('borrowings.show', compact('borrowing'));
    }

    public function edit(borrowing $borrowing)
    {
        return view('borrowings.edit', compact('borrowing'));
    }

    public function update(Request $request, borrowing $borrowing)
    {
        $request->validate([
            'member_id' => 'required',
            'book_id' => 'required',
            'return_date' => 'required',
            'created_at_borrow' => 'required'
        ]);

        $borrowing->update($request->all());

        return redirect()->route('borrowings.index')
            ->with('success', 'borrowing Book updated successfully');
    }
    
    public function destroy(borrowing $borrowing)
    {
        $borrowing->delete();

        return redirect()->route('borrowings.index')
            ->with('success', 'borrowing Book deleted successfully');
    }
}
