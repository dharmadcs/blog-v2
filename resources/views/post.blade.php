@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-3">{{ $posts->title }}</h1>

            <p>
                <small class="text-muted">    
                    By. <a href="/authors/{{ $posts->author->username }}" class="text-decoration-none">{{ $posts->author->name }}</a>
                    in <a href="/categories/{{ $posts->category->slug }}" class="text-decoration-none">{{ $posts->category->name }}</a></h5>
                    {{ $posts->created_at->diffForHumans() }}
                </small>
                </p>

                    @if ($posts->image)
                    <img src="{{ asset('storage/' . $posts->image) }}" class="img-fluid">
                    @else
                    <img src="https://source.unsplash.com/1200x600?{{ $posts->category->name }}" class="img-fluid">
                    @endif

                <article class="my-3 fs-6">
                    {!! $posts->body !!}
                </article>


            <a href="/posts" class="text-decoration-none">Back to Post</a>

        </div>
    </div>
</div>

@include('partials.footer')
@endsection