@extends('layouts.navbar')
@section('content')

<div>
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
            <a class="nav-link active" aria-current="page" href="{{route('users.manipulation')}}">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('dashboard.statistics')}}">Statistics</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('dashboard.index')}}">Main dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('dashboard.statistics')}}">Statistics</a>
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
</div>
<section class="container-fluid">
<h1 class="text-light">Changing User's role: </h1>
<div class="table-responsive">
<table class="table table-striped container">
  <thead class="">
    <tr>
      <th  class="rows" scope="col">User Name</th>
      <th class="rows" scope="col">Email</th>
      <th class="rows" scope="col">Gender</th>
      <th class="rows" scope="col">Phone</th>
      <th class="rows" scope="col">User's role</th>
      <th class="rows" scope="col"> Change user's role </th>

    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)

    <tr>
      <th class="roww" scope="row">{{$user->name}}</th>
      <td class="roww">{{$user->email}}</td>
      <td class="roww">{{$user->gender}}</td>
      <td class="roww">{{$user->phone !== null ? $user->phone : 'Not available' }}</td>
      <td class="roww">{{$user->role->type}}</td>
      <td class="roww">
      <a href="{{route('change.role', $user->id)}}" class="text-light btn-changing rounded border-0 px-2 py-1 me-2 text-decoration-none"><i class="fa-solid fa-spinner"></i> Change Role</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</section>

<style>
    .rows{
        background-color:#800080 !important;
    }
    .roww{
        background-color:#D8BFD8 !important;
    }
    .btn-changing{
        background-color:rgba(115, 45, 158, 1);
    }
    .offcanvas-header{
        background-color:rgba(115, 45, 158, 1);
    }
    .offcanvas-body{
        background:linear-gradient(rgba(115, 45, 158, 1), rgba(0, 0, 0, 1));
    }
</style>

@endsection('content')
