@extends('layouts.main')


@section('container')

<div class="row justify-content-center mt-4">
  <div class="col-md-4">
    <main class="form-login">

      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if(session()->has('errLogin'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('errLogin') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <form action="/login" method="post">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Please login</h1>
    
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required id="email" placeholder="name@example.com" value="{{ old('email') }}">
          <label for="email">Email address</label>
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" required placeholder="Password">
          <label for="password">Password</label>
        </div>
    
        <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Login</button>
      </form>
      <small class="d-block text-center mt-2">Not, registered <a href="/register">Register now!</a></small>
    </main>
  </div>
</div>
     


@endsection
