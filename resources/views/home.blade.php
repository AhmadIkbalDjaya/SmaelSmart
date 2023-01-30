@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('sidebar')
    @include('partials.sidebar')
@endsection
@section('main')
<div class="container justify-content-evenly">
  <section class="main-content-body">
    <div class="pengumuman-box mb-3">
      @include('partials.announcement')
    </div>
    @if (auth()->user()->level != 1)
    <div class="your-class-box box1 mb-3 p-1">
      <h3>Your Class</h3>
      <div class="row">
        @foreach ($user_course as $uc)
        <div class="col-md-4">
          <a href="/course/{{ $uc->id }}" class="card text-decoration-none text-dark">
            <img src="/img/dump img.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $uc->course_name }}</h5>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
    @endif

    @can('student')
    <div class="raport-box box1 mb-3 p-1">
      <h3>Raport</h3>
    </div>
    @endcan
  </section>
  <aside class="aside-content-body">
    @can('student')
    <div class="todo-list-box box1 mb-3 p-1">
      <h3>Todo List</h3>
    </div>
    @endcan
    <div class="calender-box box1 mb-3 p-1">
      <h3>Calender</h3>
    </div>
  </aside>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection
