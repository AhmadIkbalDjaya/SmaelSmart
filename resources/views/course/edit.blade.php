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
      <h3>Edit Course</h3>
      <table class="table table-sm table-borderless d-inline">
        <tr>
          <td>Nama Kelas</td>
          <td>:</td>
          <td>{{ $course->course_name }}</td>
        </tr>
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
  <div class="col-12">
    <div class="container-fluid box1 py-2">
      <h5>Edit Course</h5>
      <form action="/course/{{ $course->id }}" method="post">
      @method('put')
      @csrf
      <table class="table table-sm table-borderless d-inline">
        <tr>
          <td>Course Name <span class="required-field">*</span> </td>
          <td>:</td>
          <td>
            <div class="mb-3">
              <input type="text" name="course_name" class="form-control @error('course_name') is-invalid @enderror" id="course_name" value="{{ old('course_name', $course->course_name) }}">
              @error('course_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
          </td>
        </tr>
        <tr>
          <td>Kelas <span class="required-field">*</span> </td>
          <td>:</td>
          <td>
            <input type="hidden" name="claass_id_old" value="{{ $course->claass_id }}">
            <select class="form-select @error('claass_id') is-invalid @enderror select-claass" name="claass_id">
              @foreach ($claasses as $claass)
              <option value="{{ $claass->id }}" {{ old('claass_id', $course->claass_id) == "$claass->id" ? 'selected' : '' }}>{{ $claass->class_name }}</option>
              @endforeach
            </select>
          </td>
        </tr>
        <tr>
          <td>Guru <span class="required-field">*</span> </td>
          <td>:</td>
          <td>
            <select class="form-select @error('teacher_id') is-invalid @enderror select-claass" name="teacher_id">
              @foreach ($teachers as $teacher)
              <option value="{{ $teacher->id }}" {{ old('teacher_id', $course->teacher_id) == "$teacher->id" ? 'selected' : '' }}>{{ $teacher->user->name }}</option>
              @endforeach
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <button type="submit" name="submit" class="btn btn-primary">Edit Course</button>
          </td>
        </tr>
      </table>
      </form>
    </div>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection
