<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rentage;

class RentageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showAllRentalRequest(){
        return view('rentage.admin');
    }


    public function showUserRentalRequest(){
        $data = Rentage::with('books')->where('user_id',auth()->user()->id)->get();
        return view('rentage.user',compact('data'));
    }



    public function books(){
        $data = Book::all();
        return view('rentage.books',compact('data'));
    }

    public function store(Request $request){
        $book = Book::find($request->book_id);
        $data = $book->rentages()->create([
            'user_id' => auth()->user()->id,
            'status' => "pending"
        ]);
        return redirect('rentage');
    }

}
