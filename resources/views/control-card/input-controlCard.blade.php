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
      <h4>Kartu Kontrol</h4>
    </div>
  </div>
  <div class="col-12">
    <div class="box1 p-2">
      <h5>Pilih Kelas</h5>
      <div class="row">
        @foreach ($user_course as $uc)
        <div class="col-md-3 mb-2">
          <a href="/inputControlCard/{{ $uc->id }}/edit" class="card text-decoration-none text-dark">
            <img src="/img/dump img.jpg" class="card-img-top" alt="...">
            <div class="card-body pb-0">
              <h5 class="card-title">{{ $uc->course_name }}</h5>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection