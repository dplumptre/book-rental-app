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

                    <div class="card-header  text-white bg-success">{{ __('All Books') }}</div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Book Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col"><a href="{{ asset('books/create') }}"> <i class="fa fa-plus "></i></a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $d)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ substr($d->description, 0, 60) }}...</td>
                                        <td>
                                            <a href="{{ asset('books/' . $d->id) }}"><i class="fa fa-eye"></i></a>
                                            <a href="{{ asset('books/' . $d->id . '/edit') }}"><i
                                                    class="fa fa-edit"></i></a>


                                            <form style="display:inline" action="{{ route('books.destroy', $d->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button style="border: none;outline: none;background: none;"
                                                    onclick="return confirm('Are you sure you want to delete this item?');"
                                                    type="submit"><i class="fa fa-trash text-danger"></i></button>
                                            </form>



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
