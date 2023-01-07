@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">


            <div class="alert alert-info">You can view book details only when the admin has approved your book request</div>


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
                                <th scope="col">Status</th>
                                <th scope="col">Review</th>
                                <th scope="col">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $d)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $d->books->name }}</td>
                                <td>{{ $d->status }}</td>
                                <td>

                                    @if($d->status =="approved")
                                    <a href="{{ asset('rentage/'.$d->id)}}" class="btn btn-primary"> View & review</a></td>
                                @endif

                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-success" href="{{ asset('rentage/books') }}"><i class=" fa fa-arrow-left"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
