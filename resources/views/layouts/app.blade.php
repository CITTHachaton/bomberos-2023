

@extends('layouts.skeleton')
@section('app')

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


