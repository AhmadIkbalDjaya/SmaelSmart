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
      <h3>Edit Pengumuman</h3>
      {{-- <p>Tambah Pengumuman Untuk Ditampilkan</p> --}}
    </div>
  </div>
  <div class="col-12">
    <div class="container-fluid box1 py-2">
      <table class="table table-sm table-borderless d-inline">
        <form action="/announcement/{{ $announcement->id }}" method="post">
        @method('put')
        @csrf
        <tr>
          <td>Judul Pengumuman <span class="required-field">*</span> </td>
          <td>:</td>
          <td>
            <div class="mb-3">
              <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $announcement->title) }}">
              @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
          </td>
        </tr>
        <tr>
          <td>Isi Pengumuman <span class="required-field">*</span> </td>
          <td>:</td>
          <td>
            <div class="mb-3">
              <textarea name="content" class="@error('content') is-invalid @enderror" id="content" cols="35" rows="5">
                {{ old('content', $announcement->content) }}
              </textarea>
              {{-- <input type="text" name="content" class="form-control @error('content') is-invalid @enderror" id="content" value="{{ old('content') }}"> --}}
              @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
          </td>
        </tr>
        <tr>
          <td>Berlaku Hingga <span class="required-field">*</span> </td>
          <td>:</td>
          <td>
            <div class="mb-3">
              <input type="date" name="expire_date" class="form-control @error('expire_date') is-invalid @enderror" id="expire_date" value="{{ old('expire_date', $announcement->expire_date) }}">
              @error('expire_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <button type="submit" name="submit" class="btn btn-primary">Tambahkan Pengumuman</button>
          </td>
        </tr>
        </form>
      </table>
    </div>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection