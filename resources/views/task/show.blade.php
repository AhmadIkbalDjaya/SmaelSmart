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
      <div class="d-flex justify-content-between">
        <a href="/userCourse/{{ $course->id }}" class="text-decoration-none">< Kembali</a>
        @can('teacher')
        <a href="/userCourse/{{ $course->id }}/task/{{ $task->id }}/edit" class="text-decoration-none">Edit Tugas ></a>
        @endcan
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="container-fluid box1 py-2">
      <div class="head d-flex justify-content-between">
        <h4 class="">Detail Tugas</h4>
      </div>
      <div class="">
        <h5>{{ $task->name }}</h5>
        <p class="card-subtitle text-muted">{{ $task->created_at->format('d F Y') }}</p>
        <p>{{ $task->description }}</p>
        @if ($task->file)
        <a href="{{ asset('storage/'. $task->file) }}" download="{{ $task->name }}" class="text-decoration-none">
          <i class="fa-solid fa-file"></i> Download Lampiran
        </a>
        @endif
        {{-- <p>Deadline: {{ ($task->due_date)->format('d-F-Y') }}</p> --}}
        {{-- <p>Deadline: {{ $task->due_date }}</p> --}}
        <p>Deadline: {{ date('d F Y', strtotime($task->due_date)) }}</p>
        @can('teacher')
        <form action="/userCourse/{{ $course->id }}/task/{{ $task->id }}" method="post">
          @method('delete')
          @csrf
          <button class="dropdown-item text-danger" onclick="return confirm('Yakin Ingin Menghpaus Tugas?')"><i class="fa-regular fa-trash-can"></i> Hapus Tugas</button>
        </form>
        @endcan
      </div>
    </div>
  </div>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection