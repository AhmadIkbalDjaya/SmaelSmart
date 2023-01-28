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
    <h5>Kartu Kontrol</h5>
    <table class="table table-sm table-borderless d-inline">
      <tr>
        <td>Semester</td>
        <td>:</td>
        <td>Dua 2</td>
      </tr>
      <tr>
        <td>Tahun Pelajaran</td>
        <td>:</td>
        <td>2019</td>
      </tr>
    </table>
    <br>
    <span class="badge text-bg-danger">
      Tidak Tuntas
    </span>
  </div>
  <div class="col-12 p-0">
    <table class="table table-bordered box1">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Mata Pelajaran</th>
          <th scope="col">Guru Mapel</th>
          <th scope="col">Ulangan Harian</th>
          <th scope="col">Tugas</th>
          <th scope="col">Hafalan Surah</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <th>Bahasa Inggris</th>
          <td>Fakhrul Rasyid</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <th>Bahasa Inggris</th>
          <td>Fakhrul Rasyid</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection