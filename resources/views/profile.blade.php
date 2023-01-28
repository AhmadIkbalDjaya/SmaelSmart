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
        <h3 class="my-0">{{ auth()->user()->name }}</h3>
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
  </div>
  <div class="col-12 p-0 box1 p-3">
    <h4>Biodata</h4>
    <table class="table table-sm table-borderless d-inline">
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td>{{ auth()->user()->name }}</td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>{{ $profile->gender }}</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td>{{ $profile->email }}</td>
      </tr>
      <tr>
        <td>Nomor Telepon</td>
        <td>:</td>
        <td>{{ $profile->phone }}</td>
      </tr>
    </table>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection