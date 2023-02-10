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
    <form action="/user/{{ $profile->user->id }}" method="post">
    @method('put')
    @csrf
    <input type="hidden" name="user_id" value="{{ $profile->user->id }}">
    <input type="hidden" name="user_level" value="{{ $profile->user->level }}">
    @if ($profile->user->level == 3)
      <input type="hidden" name="student_id" value="{{ $profile->id }}">
    @else
      <input type="hidden" name="teacher_id" value="{{ $profile->id }}">
    @endif
    {{-- <input type="hidden" name="teacher_id" value="{{ $profile->user->id }}"> --}}
    <table class="table table-sm table-borderless d-inline">
      <tr>
        <td>Username <span class="required-field">*</span> </td>
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
        <td>Nama <span class="required-field">*</span> </td>
        <td>:</td>
        <td>
          <div class="mb-3">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $profile->user->name) }}">
            @error('name')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
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
        <td>Role <span class="required-field">*</span> </td>
        <td>:</td>
        <td>
          <select class="form-select select-level" name="level" aria-label="Default select example">
            <option value="2" {{ old('level', $profile->user->level) == '2' ? 'selected' : '' }}>Teacher</option>
            <option value="3" {{ old('level', $profile->user->level) == '3' ? 'selected' : '' }}>Student</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Email <span class="required-field">*</span> </td>
        <td>:</td>
        <td>
          <div class="mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email', $profile->email) }}">
            @error('email')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>
        </td>
      </tr>
      <tr>
        <td>Nomor Telepon <span class="required-field">*</span> </td>
        <td>:</td>
        <td>
          <div class="mb-3">
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone', $profile->phone) }}">
            @error('phone')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>
        </td>
      </tr>
      <tr>
        <td>Jenis Kelamin <span class="required-field">*</span> </td>
        <td>:</td>
        <td>
          <select class="form-select" name="gender" aria-label="Default select example">
            <option value="Laki-laki" {{ old('gender', $profile->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('gender', $profile->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
          </select>
        </td>
      </tr>
      {{-- @if ($profile->user->level == 3) --}}
      <tr class="update-claass" style="display:none;">
        <td>Kelas <span class="required-field">*</span> </td>
        <td>:</td>
        <td>
          <select class="form-select @error('claass_id') is-invalid @enderror select-claass" name="claass_id" style="display: none">
            @foreach ($claasses as $claass)
            <option value="{{ $claass->id }}" {{ old('claass_id', $profile->claass_id) == "$claass->id" ? 'selected' : '' }}>{{ $claass->class_name }}</option>
            @endforeach
          </select>
        </td>
      </tr>
      {{-- @endif --}}
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