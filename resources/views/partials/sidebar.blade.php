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
    </div>
  </div>
  <ul class="content-sidebar main-content-sidebar">
    <li><a href="/" class="{{ Request::is('/') ? 'active-page' : '' }}"><i class="fa-solid fa-house"></i>Home</a></li>
    <li><a href="/calender" class="{{ Request::is('calender') ? 'active-page' : '' }}"><i class="fa-regular fa-calendar-days"></i>Kalender</a></li>
    @if (auth()->user()->level != 1)
    
    @can('student')
    <li><a href="/studentRaport" class="{{ Request::is('studentRaport') ? 'active-page' : '' }}"><i class="fa-solid fa-book-open-reader"></i>Raport</a></li>
    <li><a href="/controlCard" class="{{ Request::is('controlCard*') ? 'active-page' : '' }}"><i class="fa-solid fa-address-card"></i>Kartu Kontrol</a></li>
    @endcan
    @can('teacher')
    <li><a href="/inputScore" class="{{ Request::is('inputScore*') ? 'active-page' : '' }}"><i class="fa-solid fa-book-open-reader"></i>Input Nilai</a></li>
    <li><a href="/inputControlCard" class="{{ Request::is('inputControlCard*') ? 'active-page' : '' }}"><i class="fa-solid fa-address-card"></i>Kartu Kontrol</a></li>
    @endcan

    @endif

    @if (auth()->user()->level == 1)
    {{-- <li><a href="/user/add" class="{{ Request::is('raport') ? 'active-page' : '' }}"><i class="fa-sharp fa-solid fa-book"></i>Add User</a></li> --}}
    <li><a href="/user" class="{{ Request::is('user*') ? 'active-page' : '' }}"><i class="fa-solid fa-users"></i>User</a></li>
    <li><a href="/announcement" class="{{ Request::is('announcement*') ? 'active-page' : '' }}"><i class="fa-solid fa-bullhorn"></i>Announcement</a></li>
    <li><a href="/course" class="{{ Request::is('course*') ? 'active-page' : '' }}"><i class="fa-solid fa-address-book"></i>Course</a></li>
    @endif
  </ul>
  <hr class="mx-2 line-sidebar">
  <ul class="content-sidebar lesson-content-sidebar">
    
    @if (auth()->user()->level != 1)
      @foreach ($user_course as $uc)
      <li><a href="/userCourse/{{ $uc->id }}" class="{{ Request::is('userCourse/'.$uc->id.'*') ? 'active-page' : '' }}"><i class="fa-solid fa-book"></i> {{ $uc->course_name }}</a></li>
      @endforeach
    @endif
  </ul>
</div>
<!-- end sidebar -->