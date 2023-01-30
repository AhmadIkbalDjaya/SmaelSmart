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
    <div class="calender-box box1 mb-3 p-1">
      <h3>Calender</h3>
    </div>
  </section>
  <aside class="aside-content-body">
    <div class="todo-list-box box1 mb-3 p-1">
      <h3>Todo List</h3>
    </div>
  </aside>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection