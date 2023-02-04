@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('sidebar')
    @include('partials.sidebar')
@endsection
@section('main')
<div class="container mx-auto row justify-content-between">
  <div class="col-12 mb-5">
    <div class="box1 p-2">
      <h4>Kartu Kontrol</h4>
      <p>Kartu Kontrol adalah syarat wajib yang harus di tuntaskan oleh siswa untuk dapat mengikuti ujian semester</p>
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
      <br>
      @if ($status == 1)
        <span class="badge text-bg-success">
          Tuntas
        </span>
      @else
        <span class="badge text-bg-danger">
          Tidak Tuntas
        </span>
      @endif
    </div>
  </div>
  <div class="col-12">
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
        @foreach ($control_courses as $control_course)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $control_course->course->course_name }}</td>
          <td>{{ $control_course->course->teacher->user->name }}</td>
          <td>
            @if ($control_course->daily_test == 0)
              <span class="badge text-bg-danger w-100">
                Tidak Tuntas
              </span>
            @else
              <span class="badge text-bg-success w-100">
                Tuntas
              </span>
            @endif
          </td>
          <td>
            @if ($control_course->assignment == 0)
              <span class="badge text-bg-danger w-100">
                Tidak Tuntas
              </span>
            @else
              <span class="badge text-bg-success w-100">
                Tuntas
              </span>
            @endif
          </td>
          <td>
            @if ($control_course->recitation == 0)
              <span class="badge text-bg-danger w-100">
                Tidak Tuntas
              </span>
            @else
              <span class="badge text-bg-success w-100">
                Tuntas
              </span>
            @endif
          </td>
        </tr>
        @endforeach
        {{-- <tr>
          <td>1</td>
          <td>Bahasa Inggris</td>
          <td>Fakhrul Rasyid</td>
          <td>
            <span class="badge text-bg-danger w-100">
              Tidak Tuntas
            </span>
          </td>
          <td></td>
          <td></td>
        </tr> --}}
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection