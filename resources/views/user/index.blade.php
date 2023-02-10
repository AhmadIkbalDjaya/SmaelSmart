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
      <h3>Manage User</h3>
      <p>Tambah, Edit atau Hapus User</p>
      <a href="/user/create" class="btn btn-primary mb-2">Tambah User</a>
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
          <th scope="col">Username</th>
          <th scope="col">Name</th>
          <th scope="col">Role</th>
          <th scope="col">Update On</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $user->username }}</td>
          <td>{{ $user->name }}</td>
          <td>
            @if ($user->level==2)
              Teacher
            @else
              Student
            @endif
          </td>
          <td>
            {{ $user->updated_at->format('d F Y') }}
          </td>
          <td>
            <a href="/user/{{ $user->id }}" class="badge bg-info text-decoration-none">Detail</a>
            <a href="/user/{{ $user->id }}/edit" class="badge bg-warning text-decoration-none">Edit</a>
            <form action="/user/{{ $user->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Yakin Ingin Menghapus User?')">Delete</button>
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