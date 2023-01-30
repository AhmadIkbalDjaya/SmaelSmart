@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('sidebar')
    @include('partials.sidebar')
@endsection
@section('main')
<div class="container mx-auto row justify-content-between">
  <div class="col-12">
    @include('partials.announcement')
  </div>
  <div class="col-12 my-3">
    <div class="box1 pt-2">
      <div class="head container-fluid">
        <h3>Manage Pengumuman</h3>
        <p>Tambahkan, edit, atau hapus pengumuman</p>
        <a href="/announcement/create" class="btn btn-primary mb-2">Tambah Pengumuman</a>
        @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
      </div>
      <table class="table box1 table-bordered user-table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Judul</th>
            <th scope="col">Content</th>
            <th scope="col">Berlaku Hingga</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($announcements as $announcement)
          <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $announcement->title }}</td>
              <td>{{ Str::limit($announcement->content, 40) }}</td>
              <td>{{ $announcement->expire_date }}</td>
              <td>
                <a href="/announcement/{{ $announcement->id }}" class="badge bg-info text-decoration-none">Detail</a>
                <a href="/announcement/{{ $announcement->id }}/edit" class="badge bg-warning text-decoration-none">Edit</a>
                <form action="/announcement/{{ $announcement->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Yakin Ingin Menghapus Pengumuman?')">Delete</button>
                </form>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection