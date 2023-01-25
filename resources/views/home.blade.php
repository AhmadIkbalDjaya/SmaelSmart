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
    <div class="your-class-box border mb-3 p-1">
      <h3>Your Class</h3>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <img src="/img/dump img.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <a href="">
                <h5 class="card-title">Card title</h5>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="/img/dump img.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <a href="">
                <h5 class="card-title">Card title</h5>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="/img/dump img.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <a href="">
                <h5 class="card-title">Card title</h5>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="/img/dump img.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <a href="">
                <h5 class="card-title">Card title</h5>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="/img/dump img.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <a href="">
                <h5 class="card-title">Card title</h5>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="/img/dump img.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <a href="">
                <h5 class="card-title">Card title</h5>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="raport-box border mb-3 p-1">
      <h3>Raport</h3>
    </div>
  </section>
  <aside class="aside-content-body">
    <div class="todo-list-box border mb-3 p-1">
      <h3>Todo List</h3>
    </div>
    <div class="calender-box border mb-3 p-1">
      <h3>Calender</h3>
    </div>
  </aside>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection
