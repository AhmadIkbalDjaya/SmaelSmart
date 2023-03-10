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
              <td>{{ auth()->user()->name }}</td>
            </tr>
            <tr>
              <td>Nomor Induk</td>
              <td>:</td>
              <td>{{ auth()->user()->username }}</td>
            </tr>
            <tr>
              <td>Kelas</td>
              <td>:</td>
              <td>{{ auth()->user()->student->claass->class_name }}</td>
            </tr>
          </table>
        </div>
        <div class="col-md-6">
          <table class="table table-sm table-borderless d-inline">
            <tr>
              <td>Jumlah Mata Pelajaran</td>
              <td>:</td>
              <td>{{ $total_course }}</td>
            </tr>
            <tr>
              <td>Rata-Rata Nilai</td>
              <td>:</td>
              <td>{{ $averange_score }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
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
          @foreach ($scores as $score)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $score->course->course_name }}</td>
            <td>{{ $score->course->teacher->user->name }}</td>
            <td>{{ $score->score }}</td>
            <td>
              @if ($score->score >= 93.34)
                A
              @elseif ($score->score >= 86.68)
                B
              @elseif ($score->score >= 80)
                C
              @else
                
              @endif
            </td>
          </tr>
          @endforeach
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