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
    <div class="d-flex justify-content-between">
      <a href="/announcement" class="text-decoration-none">< Kembali</a>
      <a href="/announcement/{{ $announcement->id }}/edit" class="text-decoration-none">Edit Pengumuman ></a>
    </div>
    <div class="content mt-3">
      <h3>Detail Pengumuman</h3>
      <h6>Judul Pengumuman</h6>
      <p>{{ $announcement->title }}</p>
      <h6>Isi Pengumuman</h6>
      <p>{{ $announcement->content }}</p>
      <h6>Berlaku Hingga</h6>
      <p>{{ $announcement->expire_date }}</p>
    </div>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection