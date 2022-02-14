@extends('layouts.app')


@section('content')
@auth
<div class="container pt-5 position-relative mt-3">
 <button onClick="onslick()" class="btn btn-primary position-absolute mx-3 my-2">Create Post</button>
 @include('posts.create') 
 @if( Auth::user()->id == $latest->user_id)
 <div class="container p-2 d-flex flex-row justify-content-end  mb-1">     
  <a href="/blog/{{$latest->id}}/edit" class="btn btn-primary px-4" style="margin-right: 20px">Edit</a>
  <form action="/blog/{{ $latest->id }}" method="POST">
     @csrf
     @method('delete')
     <button type="submit" class="btn btn-danger px-4">Delete</button>
  </form>
</div>
 @endif
@endauth

  <div class="container d-flex align-items-center justify-content-around">
       <div class="container mt-3 d-flex flex-column text-light postcard dark red" style="min-height: 500px">
             <div class="container d-flex py-4 justify-content-between align-items-center "style="min-height: 600px">
                   <img class="img-fluid h-100 w-50" style="object-fit: cover" src="{{ asset('images/' . $latest->image ) }}" alt="">
                   <div class="container px-5 d-flex flex-column">
                       <h1 class="py-3 text-warning display-2">{{ $latest->title }}</h1>
                       <p>Posted By: {{ $latest->user->name }} {{ date('M d, Y', strtotime($latest->created_at)) }} </p>
                       <p class="lead">{{ $latest->content }}</p>
                   </div>
             </div>
       </div>
  </div> 
 
 <section class="bg-dark mt-0 d-flex flex-column align-items-center">
    <div class="container" style="width:80%">
      <h1 class="h1 text-center text-light" id="pageHeaderTitle">Previous Post</h1>
      @foreach ($posts as $post)
      @auth
        @if( Auth::user()->id == $post->user_id)


        <div class="container p-2 d-flex flex-row justify-content-end  mb-1">
          
          <a href="/blog/{{$post->id}}/edit" class="btn btn-primary px-4" style="margin-right: 20px">Edit</a>
          <form action="/blog/{{ $post->id }}" method="POST">
             @csrf
             @method('delete')
             <button type="submit" class="btn btn-danger px-4">Delete</button>
          </form>
        </div>
      @endif
      @endauth
      <article class="postcard dark {{ $pred[round(rand(0,3))]}}">
        <a class="postcard__img_link" href="#">
          <img class="postcard__img" src="{{ asset('images/' . $post->image ) }}" alt="Image Title" />
        </a>
        <div class="postcard__text">
          <h1 class="postcard__title blue"><a href="/blog/{{ $post->id}}">{{ $post->title }}</a></h1>
          <div class="postcard__subtitle small">
            <time datetime="2020-05-25 12:00:00">
              <i class="fas fa-calendar-alt mr-2"></i>Posted By: {{ $post->user->name }} {{ date('M d, Y', strtotime($post->created_at)) }} 
            </time>
          </div>
          <div class="postcard__bar"></div>
          <div class="postcard__preview-txt">{{ $post->content }}</div>
          <ul class="postcard__tagbox">
            <li class="tag__item play blue">
              <a href="/blog/{{ $post->id}}" ><i class="fas fa-play mr-2"></i>View More Detail</a>
            </li>
          </ul>
        </div>
      </article>
      @endforeach
     
      
    </div>
  </section>
  
  
@endsection
