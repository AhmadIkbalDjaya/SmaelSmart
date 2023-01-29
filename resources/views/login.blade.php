@extends('layouts.main')

@section('navbar')
  <!-- navbar -->
  <nav class="navbar py-2">
    <div class="container">
      <a href="/">
        <span class="mb-0 h3">Smael Smart</span>
      </a>
    </div>
  </nav>
  <!-- end navbar -->
@endsection

@section('main')
  <!-- main -->
  <main class="container-fluid">
    <div class="login-box m-auto rounded-2">
      <h3>Login</h3>
      <hr>
      <form action="/login" method="POST">
        @csrf
        <div class="mb-3">
          <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username') }}" placeholder="NIS/NIP">
          @error('username')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="input password" placeholder="Password">
          @error('password')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        {{-- <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div> --}}
        <button type="submit" class="btn tombol-login w-100">Masuk</button>
      </form>
    </div> 
  </main>
  <!-- end main -->
@endsection

@section('footer')
    @include('partials.footer')
@endsection