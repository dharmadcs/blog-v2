@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $post->title }}</h1>

                <a href="/dashboard/posts" class="btn btn-info"><i class="bi bi-arrow-left-square"></i> Back</a>
                
                <a href="" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>

                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are Yout Sure?')"><i class="bi bi-trash"></i> Delete</button>
                  </form>


                    {{-- @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-3">
                    @else
                    <img src="https://source.unsplash.com/1200x600?{{ $post->name }}" class="img-fluid mt-3">
                    @endif --}}




                <article class="my-3 fs-6 mt-3">
                    {!! $post->body !!}
                </article>

        </div>
    </div>
</div>

@endsection