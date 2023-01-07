@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">






            <div class="card">
                <div class="card-header  text-white bg-success"> {{ __('Book Details & Reviews') }}</div>

                <div class="card-body">

                    <table class="table">

                        <tbody>
                            <tr>
                                <th class="text-success">Name:</th>
                            </tr>
                            <tr>
                                <td>{{ $book->name }} </td>
                            </tr>
                            <tr>
                                <th class="text-success">Description:</th>
                            </tr>
                            <tr>
                                <td>{{ $book->description }} </td>
                            </tr>
                        </tbody>
                    </table>



                    <h4>Reviews</h4>
                    @if(count($reviews) == 0)
                    <i>no reviews yet!</i>
                    @endif
                    <ul>
                        @foreach($reviews as $key => $review)
                        <li>{{$review->review}} <i> - by {{ $review->users->name }}</i></li>
                        @endforeach

                    </ul>
                    <hr>
                    <h4>Leave a Review </h4>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if (count($errors) > 0)
                    <div class="text-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ asset('rentage/review/store') }}">
                        @csrf
                        <input type="hidden" name="book_id" value="{{$book->id}}">
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea placeholder="review..." class="form-control" name="review" rows="3"></textarea>
                        </div>
                        <input type="submit" name="submit" value="submit" class="btn btn-success">
                    </form>





                </div>
            </div>
        </div>
    </div>
</div>
@endsection
