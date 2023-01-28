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
        <form action="/courseMaterial/add" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="teacher_id" value="{{ $course->teacher->id }}">
          <input type="hidden" name="course_id" value="{{ $course->id }}">
          <div class="mb-3">
            <label for="Judul Materi" class="form-label">Judul Materi</label>
            <input type="text" name="title" class="form-control" id="Judul Materi" placeholder="Judul Materi">
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">File</label>
            <input class="form-control" type="file" name="file" id="formFile">
          </div>
          <button type="submit" name="submit" class="btn btn-primary mb-3">Tambah Materi</button>
        </form>
      </div>
    </div>
  </div>
  </div>
  {{-- <div class="col-12 border py-5">
    <div class="container-fluid">
      <ul class="topics list-unstyled">
        <li class="section">
          <h3 class="section-title">
            <a href="" class="text-decoration-none">Materi</a>
          </h3>
          <div class="section-body ms-3">
            <div class="section-field">
              <a href="" class="text-decoration-none">
                Materi 1
              </a>
            </div>
            <div class="section-desc ms-4">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, suscipit?
            </div>
          </div>
          <hr>
        </li>
        <li class="section">
          <h3 class="section-title">
            <a href="" class="text-decoration-none">Tugas</a>
          </h3>
          <div class="section-body ms-3">
            <div class="section-field">
              <a href="" class="text-decoration-none">
                Tugas 1
              </a>
            </div>
            <div class="section-desc ms-4">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, suscipit?
            </div>
          </div>
          <hr>
        </li>
      </ul>
    </div>
  </div> --}}
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection