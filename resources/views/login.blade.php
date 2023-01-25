@extends('layouts.main')

@section('navbar')
  <!-- navbar -->
  <nav class="navbar py-2">
    <div class="container">
      <a href="/">
        <span class="mb-0 h3">Navbar</span>
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
      <form>
        <div class="mb-3">
          <input type="text" class="form-control" id="username">
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" id="input password">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>
        <button type="submit" class="btn tombol-login w-100">Masuk</button>
      </form>
    </div> 
  </main>
  <!-- end main -->
@endsection

@section('footer')
    @include('partials.footer')
@endsection