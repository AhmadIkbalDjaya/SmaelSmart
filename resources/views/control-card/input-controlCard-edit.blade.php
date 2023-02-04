@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('sidebar')
    @include('partials.sidebar')
@endsection
@section('main')
<div class="container mx-auto row justify-content-between">
  <div class="col-12 mb-3">
    <div class="box1 p-2">
      <h4>Update Status Kartu Kontrol</h4>
      <table class="table table-sm table-borderless d-inline">
        <tr>
          <td>Kelas</td>
          <td>:</td>
          <td>{{ $course->claass->class_name }}</td>
        </tr>
        <tr>
          <td>Matkul</td>
          <td>:</td>
          <td>{{ $course->course_name }}</td>
        </tr>
      </table>
      <div>
        <a href="/inputScore">< Kembali</a>
      </div>
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
    </div>
  </div>
  <div class="col-12">
    <div class="table-responsive">
      <table class="table table-sm table-bordered box1">
        <tr>
          <th>No</th>
          <th>Nama Siswa</th>
          <th>Ulangan Harian</th>
          <th>Tugas</th>
          <th>Hafalan Surah</th>
          <th>Simpan</th>
        </tr>
        @foreach ($control_cards as $control_card)
        <tr>
          <form action="/inputControlCard/{{ $course->id }}/{{ $control_card->id }}" method="post">
            @csrf
            {{-- <input type="hidden" name="coba" value="coba"> --}}
            <td>{{ $loop->iteration }}</td>
            <td>{{ $control_card->student->user->name }}</td>
            <td class="p-0">
              <select class="form-select form-select-sm" name="daily_test">
                <option value="0" {{ $control_card->daily_test == '0' ? 'selected' : ''}}>Tidak Tuntas</option>
                <option value="1" {{ $control_card->daily_test == '1' ? 'selected' : ''}}>Tuntas</option>
              </select>
            </td>
            <td class="p-0">
              <select class="form-select form-select-sm" name="assignment">
                <option value="0" {{ $control_card->assignment == '0' ? 'selected' : ''}} >Tidak Tuntas</option>
                <option value="1" {{ $control_card->assignment == '1' ? 'selected' : ''}}>Tuntas</option>
              </select>
            </td>
            <td class="p-0">
              <select class="form-select form-select-sm" name="recitation">
                <option value="0" {{ $control_card->recitation == '0' ? 'selected' : ''}} >Tidak Tuntas</option>
                <option value="1" {{ $control_card->recitation == '1' ? 'selected' : ''}}>Tuntas</option>
              </select>
            </td>
            <td class="p-0">
              <button type="submit" class="btn btn-primary btn-sm w-100">Simpan</button>
            </td>
          </form>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection