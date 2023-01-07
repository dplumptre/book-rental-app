<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rentage;
use App\Models\Review;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class RentageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAllRentalRequest()
    {
        $books = Rentage::with('users', 'books.reviews.users')->get();
        return view('rentage.admin.admin', compact('books'));
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
        return view('rentage.user.user', compact('data'));
    }

    public function books()
    {
        $data = Book::with([
            'rentages' => function ($query) {
                $query->where('user_id', auth()->user()->id);
            },
        ])->get();
        //dd($data);
        return view('rentage.user.books', compact('data'));
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

    public function showUserRentedBook(Rentage $rentage)
    {
        //dd($rentage);
        if (!Gate::allows('viewRentage', $rentage)) {
            abort(403);
        }

        $book = Book::find($rentage->book_id);
        $reviews = Review::where('book_id', $rentage->book_id)->get();
        return view('rentage.user.book-details', compact('book', 'reviews'));
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
