@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('sidebar')
    @include('partials.sidebar')
@endsection
@section('main')
<div class="container mx-auto row justify-content-between">
  <div class="col-12 my-4">
    <div class="container-fluid border py-2">
      <h3>{{ $course->course_name }}</h3>
      <table class="table table-sm table-borderless d-inline">
        <tr>
          <td>Kelas</td>
          <td>:</td>
          <td>{{ $course->claass->class_name }}</td>
        </tr>
        <tr>
          <td>Guru Mata Pelajaran</td>
          <td>:</td>
          <td>{{ $course->teacher->user->name }}</td>
        </tr>
      </table>
      <div class="title-download mt-3 d-flex justify-content-between">
        <h5>{{ $material->title }}</h5>
        <a href="{{ asset('storage/'. $material->file) }}" download="{{ $material->title }}.pdf">Download Materi</a>
      </div>
    </div>
  </div>
  <div class="col-md-12 mb-5">
    <div class="container-fluid py-2">
      <embed type="application/pdf" src="{{ asset('storage/'. $material->file) }}" height="900" style="width: 100%;"></embed>
    </div>
  </div>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection