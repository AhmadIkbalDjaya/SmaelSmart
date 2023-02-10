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
    </div>
  </div>
  <div class="col-md-12">
    <div class="container-fluid box1 py-2">
      <div class="head d-flex justify-content-between">
        <h5 class="">Upload Materi</h5>
      </div>
      <div class="upload-file">
        <form action="/userCourse/{{ $course->id }}/material" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="teacher_id" value="{{ $course->teacher->id }}">
          <input type="hidden" name="course_id" value="{{ $course->id }}">
          <div class="mb-3">
            <label for="Judul Materi" class="form-label">Judul Materi <span class="required-field">*</span> </label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="Judul Materi" placeholder="Judul Materi">
            @error('title')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">File <span class="required-field">*</span> </label>
            <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" id="formFile">
            @error('file')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>
          <button type="submit" name="submit" class="btn btn-primary mb-3">Tambah Materi</button>
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