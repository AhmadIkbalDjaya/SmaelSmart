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
    <div class="box1 p-2">
      <h4>Input Nilai</h4>
      <table class="table table-sm table-borderless d-inline">
        <tr>
          <td>Kelas</td>
          <td>:</td>
          <td>{{ $course->claass->class_name }}</td>
        </tr>
        <tr>
          <td>Matkul</td>
          <td>:</td>
          <td>{{ $course->course_name }}</td>
        </tr>
      </table>
      <div>
        <a href="/inputScore">< Kembali</a>
      </div>
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
    </div>
  </div>
  <div class="col-12">
    <div class="table-responsive">
      <table class="table table-sm table-bordered box1">
        <tr>
          <th>No</th>
          <th>Nama Siswa</th>
          <th>Nilai</th>
          <th>Simpan</th>
        </tr>
        @foreach ($scores as $score)
        <tr>
          <form action="/inputScore/{{ $course->id }}/{{ $score->id }}" method="post">
            @csrf
            <td>{{ $loop->iteration }}</td>
            <td>{{ $score->student->user->name }}</td>
            <td>
              <input type="number" min="0" max="100" name="score" id="score" value="{{ $score->score }}">
            </td>
            <td>
              <button type="submit" class="btn btn-primary">Simpan Nilai</button>
            </td>
          </form>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection