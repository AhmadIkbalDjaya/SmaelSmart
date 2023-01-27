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
    <div class="pengumuman-box border mb-3 p-1">
      <h3>Pengumuman</h3>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit pariatur quasi dignissimos laudantium animi nam libero voluptas eaque blanditiis officiis excepturi, obcaecati odio, eligendi eveniet quaerat fugiat adipisci. Aut, officia?</p>
    </div>
    @if (auth()->user()->level != 1)
    <div class="your-class-box border mb-3 p-1">
      <h3>Your Class</h3>
      <div class="row">
        @foreach ($user_course as $uc)
        <div class="col-md-4">
          <a href="/course" class="card text-decoration-none text-dark">
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
    <div class="raport-box border mb-3 p-1">
      <h3>Raport</h3>
    </div>
    @endcan
  </section>
  <aside class="aside-content-body">
    @can('student')
    <div class="todo-list-box border mb-3 p-1">
      <h3>Todo List</h3>
    </div>
    @endcan
    <div class="calender-box border mb-3 p-1">
      <h3>Calender</h3>
    </div>
  </aside>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection
