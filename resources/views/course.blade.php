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
    </div>
  </div>
  <div class="col-md-6">
    <div class="container-fluid border py-2">
      <h5 class="">Materi</h5>
      <ul class="">
        <li>
              <a href="" class="text-decoration-none">
                Materi 1
              </a>
        </li>
        <li></li>
      </ul>
    </div>
  </div>
  <div class="col-md-6">
    <div class="container-fluid border py-2">
      <h5>Tugas</h5>
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