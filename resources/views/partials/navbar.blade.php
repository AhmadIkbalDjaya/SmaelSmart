<!-- navbar -->
<nav class="navbar py-2 fixed-top">
  <div class="container-fluid">
    <div class="nav-left">
      <label for="humbergermenu" class="me-4 ms-4">
        <i class="fa-solid fa-bars"></i>
      </label>
      <a href="/" class="nav-title">
        <span class="mb-0 h3">Smael Smart</span>
      </a>
    </div>
    <div class="nav-right d-flex">
      <h5 class="align-self-center me-1 nav-user-name">{{ auth()->user()->name }}</h5>
      <img src="/img/profil.jpg" alt="Username" class="img-fluid rounded-circle" width="40">
      <div class="dropdown align-self-center">
        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown">
        </button>
        <ul class="dropdown-menu dropdown-menu-end mt-3">
          @if (auth()->user()->level != 1)
          <li><a class="dropdown-item" href="/profile/{{ auth()->user()->username }}"><i class="fa-solid fa-user"></i> Profile</a></li>
          @endif
          <li><a class="dropdown-item" href="#"><i class="fa-solid fa-gear"></i> Setting</a></li>
          <li class="d-block">
            <form action="/logout" method="post">
              @csrf
              <a class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i>
                <button type="submit" class="logout-button w-100 text-start">Logout</button>
              </a>
              {{-- <button type="submit"><i class="fa-solid fa-right-from-bracket"></i> Logout</button> --}}
            </form>
            {{-- <a class="dropdown-item" href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a> --}}
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<!-- end navbar -->