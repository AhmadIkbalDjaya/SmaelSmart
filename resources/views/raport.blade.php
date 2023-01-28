@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('sidebar')
    @include('partials.sidebar')
@endsection
@section('main')
<div class="container mx-auto row justify-content-between">
  <div class="col-12 box1 d-flex justify-content-between mb-5">
    <div class="col-md-6">
      <table class="table table-sm table-borderless">
        <tr>
          <td>Nama Sekolah</td>
          <td>:</td>
          <td>SMAN 11 Pangkep</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td>JL.Jalan</td>
        </tr>
        <tr>
          <td>Nama Siswa</td>
          <td>:</td>
          <td>Ahmad Ikbal Djaya</td>
        </tr>
        <tr>
          <td>Nomor Induk</td>
          <td>:</td>
          <td>148699</td>
        </tr>
      </table>
    </div>
    <div class="col-md-6">
      <table class="table table-sm table-borderless">
        <tr>
          <td>Kelas</td>
          <td>:</td>
          <td>XII Al-Khawarizmi</td>
        </tr>
        <tr>
          <td>Semester</td>
          <td>:</td>
          <td>2 (dua)</td>
        </tr>
        <tr>
          <td>Tahun Pelajaran</td>
          <td>:</td>
          <td>2019</td>
        </tr>
      </table>
    </div>
  </div>
  <div class="col-md-8 box1 capaian-kompetensi">
    <h5>Capaian Kompetensi</h5>
  </div>
  <div class="col-md-3 box1">
    <h5>Kehadiran</h5>
    <table class="table table-sm table-borderless">
      <tr>
        <td>Sakit</td>
        <td>:</td>
        <td>...</td>
        <td>Hari</td>
      </tr>
      <tr>
        <td>Izin</td>
        <td>:</td>
        <td>...</td>
        <td>Hari</td>
      </tr>
      <tr>
        <td>Tanpa Keterangan</td>
        <td>:</td>
        <td>...</td>
        <td>Hari</td>
      </tr>
    </table>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection