<!-- Sidebar -->
<div class="sidebar">
  <div class="header-sidebar text-center d-flex p-3 justify-content-evenly">
    <img src="/img/profil.jpg" alt="Profile" class="img-fluid rounded-circle">
    <h4 class="align-self-center">username</h4>
  </div>
  <ul class="content-sidebar main-content-sidebar">
    <li><a href="/" class="{{ Request::is('/') ? 'active-page' : '' }}"><i class="fa-solid fa-house"></i>Home</a></li>
    <li><a href="/calender" class="{{ Request::is('calender') ? 'active-page' : '' }}"><i class="fa-regular fa-calendar-days"></i>Kalender</a></li>
    <li><a href="/control-card" class="{{ Request::is('control-card') ? 'active-page' : '' }}"><i class="fa-solid fa-address-card"></i>Kartu Kontrol</a></li>
    <li><a href="/raport" class="{{ Request::is('raport') ? 'active-page' : '' }}"><i class="fa-sharp fa-solid fa-book"></i>Raport</a></li>
  </ul>
  <hr class="mx-2 line-sidebar">
  <ul class="content-sidebar lesson-content-sidebar">
    <li><a href="/lesson" class="{{ Request::is('lesson') ? 'active-page' : '' }}"><i class="fa-solid fa-book"></i> Matematika</a></li>
    <li><a href="" ><i class="fa-solid fa-book"></i> Fisika</a></li>
    <li><a href="" ><i class="fa-solid fa-book"></i> Kimia</a></li>
    <li><a href="" ><i class="fa-solid fa-book"></i> Bahasa Inggris</a></li>
  </ul>
</div>
<!-- end sidebar -->