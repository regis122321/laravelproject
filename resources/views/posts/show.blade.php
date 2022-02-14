@extends('layouts.app')
@section('content')
<div class="container  d-flex align-items-center justify-content-around">

    <div class="container position-relative mt-3 d-flex flex-column text-light postcard dark red" style="min-height: 500px">
        <h1 class="position-absolute mx-5 mt-4 top-0 start-0 text-light">Show</h1>
        <a href="/blog" class="btn btn-primary position-absolute mx-5 mt-4 top-0 end-0 text-light">Back</a>
          
        <div class="container d-flex py-4 justify-content-between align-items-center "style="min-height: 600px">
                <img class="img-fluid h-100 w-50"src="{{ asset('images/' . $latest->image ) }}" alt="">
                <div class="container px-5 d-flex flex-column">
                    <h1 class="py-3 text-warning display-2">{{ $latest->title }}</h1>
                    <p>Posted By: {{ $latest->user->name }} {{ date('M d, Y', strtotime($latest->created_at)) }} </p>
                    <p class="lead">{{ $latest->content }}</p>
                </div>
          </div>
    </div>
</div> 
@endsection