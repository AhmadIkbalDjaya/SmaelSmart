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
    <div class="container-fluid box1 py-2">
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
      <div>
        <br>
        <a href="/userCourse/{{ $course->id }}/material/{{ $material->id }}" class="text-decoration-none">< Kembali Ke Detail Materi</a>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="container-fluid box1 py-2">
      <div class="head d-flex justify-content-between">
        <h5 class="">Edit Materi</h5>
      </div>
      <div class="upload-file">
        <form action="/userCourse/{{ $course->id }}/material/{{ $material->id }}" method="POST" enctype="multipart/form-data">
          @method('put')
          @csrf
          {{-- <input type="hidden" name="teacher_id" value="{{ $course->teacher->id }}">
          <input type="hidden" name="course_id" value="{{ $course->id }}"> --}}
          <div class="mb-3">
            <label for="Judul Materi" class="form-label">Judul Materi <span class="required-field">*</span> </label>
            <input type="text" name="title" class="form-control" value="{{ $material->title }}" id="Judul Materi" placeholder="Judul Materi">
          </div>
          <div class="mb-3">
            <input type="hidden" name="file_old" value="{{ $material->file }}">
            <label for="formFile" class="form-label">File </label>
            <input class="form-control" type="file" name="file" id="formFile">
            <label for="">Materi Sebelumnya: </label>
            <embed type="application/pdf" src="{{ asset('storage/'. $material->file) }}" class="w-100 box1" style="min-height: 100vh"></embed>
          </div>
          <button type="submit" name="submit" class="btn btn-primary mb-3">Edit Materi</button>
        </form>
      </div>
    </div>
  </div>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection