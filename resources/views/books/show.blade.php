@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">






            <div class="card">
                <div class="card-header  text-white bg-success">{{ $book->name }} {{ __('Book Detail') }}</div>

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
                                <th class="text-success">Price:</th>
                            </tr>
                            <tr>
                                <td>{{ $book->price }} </td>
                            </tr>
                            <tr>
                                <th class="text-success">Description:</th>
                            </tr>
                            <tr>
                                <td>{{ $book->description }} </td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-success" href="{{ asset('books/') }}"><i class=" fa fa-arrow-left"></i></a>
                    <a class="btn btn-success" href="{{ asset('books/' . $book->id . '/edit') }}"><i class="fa fa-edit"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
