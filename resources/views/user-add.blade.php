@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('sidebar')
    @include('partials.sidebar')
@endsection
@section('main')
<div class="container mx-auto row justify-content-between">
  <div class="col-12 my-4">
    <div class="container-fluid box1 py-2">
      <h3>Tambahkan User</h3>
      <p>Tambah User baru pada sistem baik sebagai Guru atau Siswa</p>
    </div>
  </div>
  <div class="col-md-6 user-form">
    <div class="container-fluid box1 py-2">
      <form action="/user/add" method="post">
      @csrf
      <h5>User</h5>
      <div class="form-floating mb-3">
        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" id="floatingInput" placeholder="Email">
        <label for="floatingInput">Username</label>
        @error('username')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-floating mb-3">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
        @error('password')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-floating mb-3">
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="floatingName" placeholder="Name">
        <label for="floatingName">Name</label>
        @error('name')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
      </div>
      <select class="form-select @error('level') is-invalid @enderror" name="level" aria-label="Default select example">
        <option value="2" {{ old('level') == '2' ? 'selected' : '' }}>Teacher</option>
        <option value="3" {{ old('level') == '3' ? 'selected' : '' }}>Student</option>
        {{-- <option value="2">Teacher</option>
        <option value="3">Student</option> --}}
        @error('level')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
      </select>
    </div>
  </div>
  <div class="col-md-6 profile-form">
  <div class="container-fluid box1 py-2">
      <h5>Profile</h5>
      <div class="form-floating mb-3">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email</label>
        @error('email')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-floating mb-3">
        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" id="floatingPhone" placeholder="Phone">
        <label for="floatingPhone">Phone Number</label>
        @error('phone')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
      </div>
      <select class="form-select @error('gender') is-invalid @enderror" name="gender" aria-label="Default select example">
        {{-- <option selected>Gender</option> --}}
        <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        @error('gender')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
      </select>
    </div>
  </div>
  <div class="col-12 my-3">
    <button type="submit" class="btn btn-primary w-100">Tambah User</button>
    </form>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection