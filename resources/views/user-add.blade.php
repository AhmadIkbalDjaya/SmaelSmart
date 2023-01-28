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
        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Email">
        <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" name="name" class="form-control" id="floatingName" placeholder="Name">
        <label for="floatingName">Name</label>
      </div>
      <select class="form-select" name="level" aria-label="Default select example">
        {{-- <option selected>Role</option> --}}
        <option value="2">Teacher</option>
        <option value="3">Student</option>
      </select>
    </div>
  </div>
  <div class="col-md-6 profile-form">
    <div class="container-fluid box1 py-2">
      <h5>Profile</h5>
      <div class="form-floating mb-3">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" name="phone" class="form-control" id="floatingPhone" placeholder="Phone">
        <label for="floatingPhone">Phone Number</label>
      </div>
      <select class="form-select" name="gender" aria-label="Default select example">
        {{-- <option selected>Gender</option> --}}
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
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