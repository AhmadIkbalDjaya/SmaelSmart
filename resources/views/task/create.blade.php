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
        <h5 class="">Tambahkan Tugas</h5>
      </div>
      <div class="upload-file">
        <form action="/userCourse/{{ $course->id }}/task" method="POST" enctype="multipart/form-data">
          @csrf
          {{-- <input type="hidden" name="teacher_id" value="{{ $course->teacher->id }}"> --}}
          <input type="hidden" name="course_id" value="{{ $course->id }}">
          <div class="mb-3">
            <label for="name" class="form-label">Nama Tugas <span class="required-field">*</span> </label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama tugas">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Deskripsi Tugas <span class="required-field">*</span> </label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3"></textarea>
            @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">File </label>
            <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" id="formFile">
            @error('file')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="due_date" class="form-label">Jatuh Tempo <span class="required-field">*</span> </label>
            <input type="date" name="due_date" id="due_date" class="form-control @error('due_date') is-invalid @enderror">
            @error('due_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <button type="submit" name="submit" class="btn btn-primary mb-3">Tambah Tugas</button>
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