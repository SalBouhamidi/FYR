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
            <a class="nav-link active" aria-current="page" href="{{route('users.manipulation')}}">Users</a>
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
</section>
<section class="container">
    <h3 class="text-light mb-5">Statistics :</h3>
    <div class="statisticscontainer d-flex flex-row justify-content-between ">
        <div class="statisticCard card h-25 mb-3 px-5 d-flex justify-content-center align-items-center" style="height:5rem !important; width: 18rem; ">
            <p class="text fw-bold text-center fs-5">User: {{$statisticUser}}</p>
        </div>
        <div class="statisticCard card h-25 mb-3 px-5" style="width: 18rem; height:5rem !important;">
            <p class="text  fw-bold text-center fs-5">Number of proprities: {{$statisticProprety}}</p>
        </div>
        <div class="statisticCard card h-25 mb-3 px-5" style="width: 18rem;height:5rem !important;">
            <p class="text fw-bold text-center fs-5">Number of Roommates: {{$statisticRoommates}}</p>
        </div>
    </div>

    <div class=''>
    <h3 class="text-light mb-5">New offer Roommates:</h3>

    <div>
    <div class="content roommateoffercontainer container-fluid d-flex flex-wrap rounded justify-content-between">
                @if($Rommates !== null)
                        @foreach($Rommates as $offer)
                            <div class="cardroommates p-2" style="width: 21rem;">

                            @if($offer->user->gender === 0)
                                <img src="{{asset('images\boy.png')}}" class="card-img-top" alt="user image">
                            @elseif($offer->user->gender === 1)
                                <img src="{{asset('images\girl.png')}}" class="card-img-top" alt="user image">
                            @endif
                                <div class="card-body">
                                    <h5 class="card-title text-light">{{$offer->user->name}}</h5>
                                    <p class="card-text  text-light fw-bold">Budget:{{$offer->budget}} Dh</p>
                                    
                                            <p class="card-text  text-light fw-bold">City:{{$offer->citie->name}}</p>

                                    <div class="d-flex justify-content-center">
                                            <a href="" class="btn  px-5 addoffer">Block</a>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                    @else
                    <div class="d-flex justify-content-center">
                    <p class="text-light text-center">there's no offer yet</p>
                    </div>
                    @endif

                </div>
        </div>

    </div>

    <div class="mt-5">
    <h3 class="text-light mb-5">New Rent offer:</h3>

    <div class="propretyoffercontainer content container-fluid d-flex flex-wrap  justify-content-between">
                @if($Propreties !== null)
                        @foreach($Propreties as $proprety)
                        <div class="cardroommates pb-3" style="width: 21rem;">

                            <div id="carouselExampleAutoplaying{{$proprety->id}}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($proprety->images as $indexImg => $image)
                                    <div class="carousel-item  {{$image->id}} {{$indexImg == 0 ? 'active' : ''}}  h-50">
                                        <img src="{{asset($image->image)}}"  class="d-block w-100 card-img-top rounded" style="height:18rem;" alt="Rent propriety">
                                    </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleAutoplaying{{$proprety->id}}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleAutoplaying{{$proprety->id}}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>                                
                        <div class="card-body">    
                                    <p class="card-text  text-light fw-bold ms-2">Address: {{$proprety->address}}, {{$proprety->citie->name}}</p>
                                    <p class="card-text  text-light fw-bold ms-2">Price: {{$proprety->price}} Dh</p>
                                    <div class="d-flex justify-content-center">
                                    <a href="" class="btn  px-5 addoffer">Block</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    @else
                    <div>
                    <p>there's no offer yet</p>
                    </div>
                    @endif

            </div>



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
    .cardroommates {
        border-radius: 15px !important;
        background-color: rgba(115, 45, 158, 1);
        transform: scale(1);
    }

    .cardroommates:hover {
        transform: scale(1.05);
        /* border-style: solid;
        border-color: rgba(217, 217, 217, 1); */
    }
    .addoffer{
        color:rgba(115, 45, 158, 1);
        background-color:rgba(217, 217, 217, 1);
        box-shadow: 0 0 15px #6f58da;

    }
    .addoffer:hover{
        color:rgba(217, 217, 217, 1);
        background-color:rgba(115, 45, 158, 1);
        border-style: solid;
        border-color:rgba(217, 217, 217, 1);
    }
    @media (max-width:600px){
        .statisticscontainer{
            height:30vh;
            display:flex;
            flex-wrap: wrap;
            justify-content: center !important;
            /* background:red; */

        }
        .statisticCard{
            height:15vh;
            /* background:red; */
        }
        .roommateoffercontainer{
            grid-gap:2vh;
            display:flex;
            justify-content: center !important;
        }
        .propretyoffercontainer{
            grid-gap:2vh;
            display:flex;
            justify-content: center !important;
        }
    }
</style>
@endsection('content')