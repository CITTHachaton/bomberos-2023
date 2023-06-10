@extends('layouts.app')
@push('stylesheet')
<style>
  /* Estilos específicos para formato móvil */
  @media (max-width: 576px) {
    .mobile-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      padding: 10px;
      background-color: #f8f9fa;
      box-shadow: 0px -2px 10px rgba(0, 0, 0, 0.1);
      z-index: 9999;
      display: flex;
      justify-content: space-around;
    }

    .mobile-nav a {
      display: flex;
      flex-direction: column;
      align-items: center;
      color: #6c757d;
      text-decoration: none;
      font-size: 12px;
      transition: color 0.3s ease;
    }

    .mobile-nav a.active {
      color: #0d6efd;
    }

    .mobile-nav a.circle {
      position: relative;
      width: 60px;
      height: 60px;
      background-color: #6647ff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      animation: flames 1s infinite alternate;
    }

    .mobile-nav a.circle i {
      font-size: 24px;
    }

    @keyframes flames {
      0% {
        box-shadow: 0px 0px 10px 2px rgba(52, 6, 255, 0.8);
        transform: translateY(0);
      }
      50% {
        transform: translateY(-5px);
      }
      100% {
        box-shadow: 0px 0px 30px 6px rgba(52, 1, 255, 0.8);
        transform: translateY(0);
      }
    }
  }
</style>
@endpush
@section('content')

<nav class="mobile-nav justify-content-between">
  <a href="#" class="active">
    <i class="fa-solid fa-faucet-drip"></i>
    Grifos
  </a>
  <a href="#">
    <i class="fa-solid fa-earth-americas"></i>
    Mapa
  </a>
  <a href="#" class="circle">
    <i class="fas fa-fire"></i>
  </a>
  <a href="#">
    <i class="fa-solid fa-fire"></i>
    Bomberos
  </a>
  <a href="#">
    <i class="fas fa-user"></i>
    Profile
  </a>
</nav>

@endsection
