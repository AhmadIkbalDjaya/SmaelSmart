@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('sidebar')
    @include('partials.sidebar')
@endsection
@section('main')
<div class="container mx-auto row justify-content-between">
  <div class="col-12 box1 mb-5 py-2">
    {{-- <h1>Ahmad Ikbal Djaya</h1> --}}
    <div class="header-profile text-center d-flex p-3 justify-content-start px-4">
      <img src="/img/profil.jpg" alt="Profile" class="img-fluid rounded-circle me-2" width="100">
      <div class="name-level-profile align-self-center text-start">
        <h3 class="my-0">{{ $profile->user->name }}</h3>
        <p class="card-subtitle text-muted">
          @if (auth()->user()->level == '1')
              Admin
          @elseif(auth()->user()->level == '2')
              Teacher
          @elseif(auth()->user()->level == '3')
              Student
          @endif
        </p>
      </div>
    </div>
    <a href="/user">Back To User</a>
  </div>
  <div class="col-12 p-0 box1 p-3">
    <h4>Edit User</h4>
    <form action="/user/update" method="post">
    @csrf
    <input type="hidden" name="user_id" value="{{ $profile->user->id }}">
    <input type="hidden" name="user_level" value="{{ $profile->user->level }}">
    {{-- <input type="hidden" name="teacher_id" value="{{ $profile->user->id }}"> --}}
    <table class="table table-sm table-borderless d-inline">
      <tr>
        <td>Username</td>
        <td>:</td>
        <td>
          <div class="mb-3">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username', $profile->user->username) }}">
            @error('username')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>
        </td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td>
          <div class="mb-3">
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $profile->user->name) }}">
          </div>
        </td>
      </tr>
      <tr>
        <td>Password</td>
        <td>:</td>
        <td>
          <div class="mb-3">
            <input type="password" name="password" class="form-control" id="password" value="">
            <input type="hidden" name="passwordOld" class="form-control" id="password" value="{{ $profile->user->password }}">
          </div>
        </td>
      </tr>
      <tr>
        <td>Role</td>
        <td>:</td>
        <td>
          <select class="form-select" name="level" aria-label="Default select example">
            <option value="2" {{ old('level', $profile->user->level) == '2' ? 'selected' : '' }}>Teacher</option>
            <option value="3" {{ old('level', $profile->user->level) == '3' ? 'selected' : '' }}>Student</option>
            {{-- @if ($profile->user->level==2)
            <option value="2" selected>Teacher</option>
            <option value="3">Student</option>
            @else
            <option value="2">Teacher</option>
            <option value="3" selected>Student</option>
            @endif --}}
          </select>
        </td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td>
          <div class="mb-3">
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $profile->email) }}">
          </div>
        </td>
      </tr>
      <tr>
        <td>Nomor Telepon</td>
        <td>:</td>
        <td>
          <div class="mb-3">
            <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone', $profile->phone) }}">
          </div>
        </td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>
          <select class="form-select" name="gender" aria-label="Default select example">
            <option value="Laki-laki" {{ old('gender', $profile->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('gender', $profile->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            {{-- @if ($profile->gender=='Laki-laki')
            <option value="Laki-laki" selected>Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
            @else
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan" selected>Perempuan</option>
            @endif --}}
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <button type="submit" name="submit" class="btn btn-primary">Ubah Data User</button>
        </td>
      </tr>
    </table>
    </form>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection