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
      <a href="/user/add" class="btn btn-primary">Tambah User</a>
    </div>
  </div>
  <div class="col-12 my-3">
    <table class="table box1">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Username</th>
          <th scope="col">Name</th>
          <th scope="col">Role</th>
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
            {{-- @if ($user->level==2)
            <a href="/userT/{{ $user->teacher->id }}" class="badge bg-info">Detail</a>
            @else
            <a href="/user/{{ $user->student->id }}" class="badge bg-info">Detail</a>
            @endif --}}

            <a href="/user/{{ $user->username }}" class="badge bg-info">Detail</a>
            <a href="/user/edit/{{ $user->username }}" class="badge bg-warning">Edit</a>
              <form action="" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">Delete</button>
              </form>
          </td>
        </tr>
        @endforeach
        {{-- <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr> --}}
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection