@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('sidebar')
    @include('partials.sidebar')
@endsection
@section('main')
<div class="container mx-auto row justify-content-between">
  <div class="col-12 border mb-5 py-2">
    <h3>Matematika</h3>
    <table class="table table-sm table-borderless d-inline">
      <tr>
        <td>Kelas</td>
        <td>:</td>
        <td>Al-Khawarizmi</td>
      </tr>
      <tr>
        <td>Guru Mata Pelajaran</td>
        <td>:</td>
        <td>Hajir S.Pd, M.Pd</td>
      </tr>
    </table>
  </div>
  <div class="col-12 border py-5">
    <div class="container-fluid">
      <ul class="topics">
        <li class="section">
          <h3 class="section-title">
            <a href="">Materi</a>
          </h3>
          <div class="section-body ms-3">
            <div class="section-field">
              <a href="">
                Materi 1
              </a>
            </div>
            <div class="section-desc ms-4">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, suscipit?
            </div>
          </div>
          <hr>
        </li>
        <li class="section">
          <h3 class="section-title">
            <a href="">Materi</a>
          </h3>
          <div class="section-body ms-3">
            <div class="section-field">
              <a href="">
                Materi 1
              </a>
            </div>
            <div class="section-desc ms-4">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, suscipit?
            </div>
          </div>
          <hr>
        </li>
        <li class="section">
          <h3 class="section-title">
            <a href="">Materi</a>
          </h3>
          <div class="section-body ms-3">
            <div class="section-field">
              <a href="">
                Materi 1
              </a>
            </div>
            <div class="section-desc ms-4">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, suscipit?
            </div>
          </div>
          <hr>
        </li>
      </ul>
    </div>
  </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection