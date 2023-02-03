@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('sidebar')
    @include('partials.sidebar')
@endsection
@section('main')
<div class="container mx-auto row justify-content-between">
  <div class="col-12 mb-3">
    <div class="box1 p-3">
      <h3>Raport Hasil Belajar</h3>
      <div class="d-flex justify-content-between row">
        <div class="col-md-6 mb-3">
          <table class="table table-sm table-borderless d-inline">
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
            <tr>
              <td>Kelas</td>
              <td>:</td>
              <td>XII Al-Khawarizmi</td>
            </tr>
          </table>
        </div>
        <div class="col-md-6">
          <table class="table table-sm table-borderless d-inline">
            <tr>
              <td>Jumlah Mata Pelajaran</td>
              <td>:</td>
              <td>8 (Delapan)</td>
            </tr>
            <tr>
              <td>Rata-Rata Nilai</td>
              <td>:</td>
              <td>89.40</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    {{-- <div class="col-md-6">
      <table class="table table-sm table-borderless">
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
        <tr>
          <td>Kelas</td>
          <td>:</td>
          <td>XII Al-Khawarizmi</td>
        </tr>
      </table>
    </div> --}}
    {{-- <div class="col-md-6">
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
    </div> --}}
  </div>
  <div class="col-md-8 mb-3 capaian-kompetensi">
    <div class="box1 p-3">
      <h5>Capaian Kompetensi</h5>
      <div class="table-responsive">
        <table class="table table-sm table-bordered box1">
          <tr>
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>Guru</th>
            <th>Nilai</th>
            <th>Predikat</th>
          </tr>
          <tr>
            <td>1</td>
            <td>Bahasa Inggris</td>
            <td>Fahrul Rasyid</td>
            <td>80</td>
            <td>B</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-3">
    <div class="box1 p-3">
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
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection