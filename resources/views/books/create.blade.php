@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">



                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="card">
                    <div class="card-header  text-white bg-success">{{ __('Create Book') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('books.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Book Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Food for thots">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea placeholder="book desc..." class="form-control" name="description"
                                    rows="3"></textarea>
                            </div>
                            <input type="submit" name="submit" value="submit" class="btn btn-success">
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
