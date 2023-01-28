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
      <div class="head d-flex justify-content-between">
        <h5 class="">Materi</h5>
        @can('teacher')
          <a href="/courseMaterial/add/{{ $course->id }}" class="btn btn-primary">Tambah Materi</a>
        @endcan
      </div>
      <ul class="">
        @if (count($materials) > 0)
          @foreach ($materials as $material)
            <li>
              {{-- <a href="{{ asset('storage/'. $material->file) }}">{{ $material->title }}</a> --}}
              <a href="/courseMaterial/{{ $material->id }}">{{ $material->title }}</a>
            </li>
          @endforeach
        @else
          <p>Belum Ada Materi</p>
        @endif
      </ul>
    </div>
  </div>
  <div class="col-md-6">
    <div class="container-fluid border py-2">
      <h5>Tugas</h5>
    </div>
  </div>
  {{-- <div class="col-12">
    <div class="container-fluid border">
      <embed type="application/pdf" src="{{ asset('storage/'. $material->file) }}" width="600" height="400"></embed>
    </div>
  </div> --}}
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection