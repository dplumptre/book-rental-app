@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">


            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <div class="card">

                <div class="card-header  text-white bg-success">{{ __('Book Rental Requests') }}</div>
                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">Requested by</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                <th scope="col">Reviews</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $key => $book)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{ $book->books->name}}</td>
                                <td>{{ $book->users->name}}</td>
                                <td>{{ $book->status}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>


                                                <form style="display:inline" action="{{ route('rentage.status', $book->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" value="approved" name="status">
                                                    <button style="border: none;outline: none;background: none;" type="submit">approve</button>
                                                </form>


                                            </li>
                                            <li>
                                                <form style="display:inline" action="{{ route('rentage.status', $book->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" value="declined" name="status">
                                                    <button style="border: none;outline: none;background: none;" type="submit">decline</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td>

                                    @foreach($book->books->reviews as $key => $r)

                                    <ul>
                                        <li>{{$r->review}} by <small><i>{{$r->users->name}}</i></small></li>
                                    </ul>
                                    @endforeach

                                    <div>Total:{{ count($book->books->reviews) }}</div>


                                </td>

                            </tr>
                            @endforeach


                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
