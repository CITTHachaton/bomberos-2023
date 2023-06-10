

@extends('layouts.skeleton')
@section('app')


<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
  <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
      aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
      <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
          <use href="#circle-half"></use>
      </svg>
      <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
  </button>
  <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
      <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
              aria-pressed="false">
              <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                  <use href="#sun-fill"></use>
              </svg>
              Light
              <svg class="bi ms-auto d-none" width="1em" height="1em">
                  <use href="#check2"></use>
              </svg>
          </button>
      </li>
      <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
              aria-pressed="false">
              <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                  <use href="#moon-stars-fill"></use>
              </svg>
              Dark
              <svg class="bi ms-auto d-none" width="1em" height="1em">
                  <use href="#check2"></use>
              </svg>
          </button>
      </li>
      <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
              aria-pressed="true">
              <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                  <use href="#circle-half"></use>
              </svg>
              Auto
              <svg class="bi ms-auto d-none" width="1em" height="1em">
                  <use href="#check2"></use>
              </svg>
          </button>
      </li>
  </ul>
</div>



<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Bomberos Maipu</a>

  <ul class="navbar-nav flex-row d-md-none">
      <li class="nav-item text-nowrap">
          <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas"
              data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
              aria-label="Toggle navigation">
              <i class="fa-solid fa-bars"></i>
          </button>
      </li>
  </ul>

  <div id="navbarSearch" class="navbar-search w-100 collapse">
      <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search"
          aria-label="Search">
  </div>
</header>



<div class="container-fluid">
  <div class="row">
      @include('layouts._menu')
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('content')
      </main>
  </div>
</div>


@endsection


