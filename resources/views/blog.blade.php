@extends('layouts.main')

@section('container')

<div class="container">
    <br>
<h2 class="mb-3 text-center" >{{ $title }}</h2>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/posts" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                <button class="btn btn-danger" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>


    @if ($posts->count()> 0 )
    <div class="card mb-3">

        @if ($posts[0]->image)
        <div style="max-height: 400px; overflow:hidden">
        <img src="{{ asset('storage/' . $posts[0]->image) }}" class="img-fluid">
        </div>
        @else
        <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top">
        @endif       
        
        <div class="card-body text-center">

        <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark"><h3 class="card-title">{{ $posts[0]->title }}</h3></a>
        <p>
        <small class="text-muted">    
            By. <a href="/authors/{{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> 
            in <a href="/categories/{{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>
            {{ $posts[0]->created_at->diffForHumans() }}
        </small>
        </p>

        <p class="card-text">{{ $posts[0]->excerpt }}</p>

        <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more...</a>

        </div>
    </div>


<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as  $post)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)">
                    <a href="/categories/{{ $post->category->slug }}" class="text-white text-decoration-none">
                        {{ $post->category->name }}</a></div>
                    
                        @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid">
                        @else
                        <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top">
                        @endif
            


                
                
                <div class="card-body">
                   <a href="/post/{{ $post->slug }}" class="text-decoration-none text-white"><h5 class="card-title"> {{ $post->title }}</h5></a>
                  <p>
                    <small class="text-muted">    
                        By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                    </p>
                  <p class="card-text">{{ $post->excerpt }}</p>
                  <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read more...</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>

</div>

    @else
    <p class="text-center fs-4">Post not found.</p>
    @endif

    @include('partials.footer')
@endsection

