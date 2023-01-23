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

                <div class="card-header  text-white bg-success">{{ __('Books') }}</div>
                <div class="card-body">




                    <div class="row">




                        @foreach ($data as $d)
                        <div class="col-sm-3 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Book Title:</h5>
                                    <p class="card-text text-success"><strong>{{ $d->name }}</strong></p>




                                    <form action="{{ asset('rentage/store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="book_id" value="{{ $d->id }}">

                                        <p>&#8358; {{ $d->price }}</p>

                                        @if( (count($d->rentages)>0 && $d->rentages->first()->status == "approved") || (count($d->rentages)>0 && $d->rentages->first()->status == "pending"))
                                        <div class="text-danger"><i> requested</i>

                                        </div>
                                        @else
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to request this book?');" type="submit"> Request <i class="fa fa-book"></i></button>


                                        @endif


                                    </form>



                                </div>
                            </div>
                        </div>
                        @endforeach



                    </div>























                </div>
            </div>
        </div>
    </div>
</div>
@endsection
