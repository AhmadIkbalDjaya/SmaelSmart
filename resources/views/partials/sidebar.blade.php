<!-- Sidebar -->
<div class="sidebar">
  <div class="header-sidebar text-center d-flex p-3 justify-content-start px-4">
    <img src="/img/profil.jpg" alt="Profile" class="img-fluid rounded-circle me-2">
    <div class="name-level align-self-center text-start">
      <h6 class="my-0">{{ auth()->user()->name }}</h6>
      <p class="card-subtitle text-muted">
        @if (auth()->user()->level == '1')
            Admin
        @elseif(auth()->user()->level == '2')
            Teacher
        @elseif(auth()->user()->level == '3')
            Student
        @endif
      </p>
      {{-- @foreach ($user_course as $c)
          <p>{{ $c->course_name }}</p>
          <p>{{ $c->id }}</p>
      @endforeach --}}
    </div>
  </div>
  <ul class="content-sidebar main-content-sidebar">
    <li><a href="/" class="{{ Request::is('/') ? 'active-page' : '' }}"><i class="fa-solid fa-house"></i>Home</a></li>
    <li><a href="/calender" class="{{ Request::is('calender') ? 'active-page' : '' }}"><i class="fa-regular fa-calendar-days"></i>Kalender</a></li>
    <li><a href="/control-card" class="{{ Request::is('control-card') ? 'active-page' : '' }}"><i class="fa-solid fa-address-card"></i>Kartu Kontrol</a></li>
    <li><a href="/raport" class="{{ Request::is('raport') ? 'active-page' : '' }}"><i class="fa-sharp fa-solid fa-book"></i>Raport</a></li>
  </ul>
  <hr class="mx-2 line-sidebar">
  <ul class="content-sidebar lesson-content-sidebar">
    @if (auth()->user()->level == 1)
    <li><a href="/user/add" class="{{ Request::is('raport') ? 'active-page' : '' }}"><i class="fa-sharp fa-solid fa-book"></i>Add User</a></li>
    @endif
    
    @if (auth()->user()->level != 1)
      @foreach ($user_course as $uc)
      <li><a href="/course/{{ $uc->id }}" ><i class="fa-solid fa-book"></i> {{ $uc->course_name }}</a></li>
      @endforeach
    @endif
  </ul>
</div>
<!-- end sidebar -->