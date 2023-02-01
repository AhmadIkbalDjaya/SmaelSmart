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
      <h3>Manage Course</h3>
      <p>Tambah, Edit atau Hapus Course</p>
      <a href="/course/create" class="btn btn-primary mb-2">Tambah Course</a>
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
    </div>
  </div>
  <div class="col-12 my-3">
    <table class="table box1 table-bordered user-table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kelas</th>
          <th scope="col">Nama Course</th>
          <th scope="col">Guru</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($courses as $course)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $course->claass->class_name }}</td>
          <td>{{ $course->course_name }}</td>
          <td>{{ $course->teacher->user->name }}</td>
          <td>
            {{-- <a href="/course/{{ $course->id }}" class="badge bg-info text-decoration-none">Detail</a> --}}
            <a href="/course/{{ $course->id }}/edit" class="badge bg-warning text-decoration-none">Edit</a>
            <form action="/course/{{ $course->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Yakin Ingin Menghapus Course?')">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection