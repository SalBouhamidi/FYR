@extends('layouts.navbar')
@section('content')


<section class=" mb-5">
<nav class="navbar bg-body-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Dashboard Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Cities</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Housting type</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Posts</a>
          </li>

        </ul>

      </div>
    </div>
  </div>
</nav>
</section>
<section class="container">
    <h3 class="text-light mb-5">Statistics :</h3>
    <div class="d-flex flex-row justify-content-between">
        <div class="card h-25 mb-3 px-5 d-flex justify-content-center align-items-center" style="height:5rem !important; width: 18rem; ">
            <p class="text fw-bold text-center fs-5">User: {{$statisticUser}}</p>
        </div>
        <div class="card h-25 mb-3 px-5" style="width: 18rem;">
            <p class="text  fw-bold text-center fs-5">Number of proprities: {{$statisticProprety}}</p>
        </div>
        <div class="card h-25 mb-3 px-5" style="width: 18rem;">
            <p class="text fw-bold text-center fs-5">Number of Roommates: {{$statisticRoommates}}</p>
        </div>
    </div>
    <div>
    <h3 class="text-light mb-5">New offer Roommates:</h3>

    </div>

</section>









<style>
    .offcanvas-header{
        background-color:rgba(115, 45, 158, 1);
    }
    .offcanvas-body{
        background:linear-gradient(rgba(115, 45, 158, 1), rgba(0, 0, 0, 1));
    }
    .text{
        color:rgba(115, 45, 158, 1);
    }
</style>
@endsection('content')