<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
  <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
      aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">
            Bomberos Maipu
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
              data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 active" href="{{ route('home') }}">
                  <i class="fa-solid fa-house-user"></i>
                  Inicio
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="{{ route('grifos.index') }}">
                  <i class="fa-solid fa-faucet-drip"></i>
                  Grifos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="{{ route('mapa') }}">
                  <i class="fa-solid fa-earth-americas"></i>
                  Cercanos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 text-danger" href="{{ route('mapa_general') }}">
                  <i class="fa-solid fa-fire"></i>
                  Mapa global
                </a>
              </li>
          </ul>

          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
              {{-- <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" href="#">
                      <svg class="bi">
                          <use xlink:href="#gear-wide-connected" />
                      </svg>
                      Settings
                  </a>
              </li> --}}
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2 text-dark" href="{{ route ('usuarios.index')}}">
                    <i class="fa-solid fa-fire"></i>
                    Bomberos
                  </a>
              </li>
          </ul>
          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
              {{-- <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" href="#">
                      <svg class="bi">
                          <use xlink:href="#gear-wide-connected" />
                      </svg>
                      Settings
                  </a>
              </li> --}}
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" href="{{ route('root') }}">
                    Cerrar sesión
                  </a>
              </li>
          </ul>
      </div>
  </div>
</div>
