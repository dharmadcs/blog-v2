@extends('layouts.main')

@section('container')

<div class="container mt-4">
    <h2>Post by Authors</h2>
    <br>
    <div class="container">
        <div class="row">
            @foreach ($authors as $author)
            <div class="col-md-4">
                <a href="/authors/{{ $author->username }}" class="text-decoration-none text-white">
                <div class="card bg-dark text-white">
                    <img src="https://source.unsplash.com/500x400?{{ $author->name }}" class="img-fluid card-img">
                    <div class="card-img-overlay d-flex align-items-center p-0">
                      <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.7)">{{ $author->name }}</h5>
                    </div>
                </a>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<br>
@include('partials.footer')
@endsection

