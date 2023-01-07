<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rentage;
use App\Models\Review;

class RentageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAllRentalRequest()
    {
        $books = Rentage::with('users', 'books.reviews.users')->get();
        //dd($books);
        return view('rentage.admin', compact('books'));
    }

    public function rentageStatus(Request $request, Rentage $rentage)
    {
        $rentage->status = $request->status;
        $rentage->save();
        return back();
    }

    public function showUserRentalRequest()
    {
        $data = Rentage::with('books')
            ->where('user_id', auth()->user()->id)
            ->get();
        return view('rentage.user', compact('data'));
    }

    public function books()
    {
        $data = Book::all();
        return view('rentage.books', compact('data'));
    }

    public function store(Request $request)
    {
        $book = Book::find($request->book_id);
        $data = $book->rentages()->create([
            'user_id' => auth()->user()->id,
            'status' => 'pending',
        ]);
        return redirect('rentage');
    }

    public function showUserRentedBook(Book $book)
    {
        $reviews = Review::where('book_id', $book->id)->get();
        return view('rentage.book-details', compact('book', 'reviews'));
    }

    public function storeReview(Request $request)
    {
        $request->validate([
            'review' => 'required',
        ]);
        $book = Book::find($request->book_id);
        $book->reviews()->create([
            'user_id' => auth()->user()->id,
            'review' => $request->review,
        ]);
        return back()->with('success', 'Review was saved successfully');
    }
}
