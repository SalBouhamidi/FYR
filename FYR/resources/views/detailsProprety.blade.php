@extends('layouts.navbar')
@section('content')

<main class="content container">

<a class="navbar-brand w-25 text-light fw-bold fs-4 ms-2" href="#">Welcome to F<span style="color:rgba(115, 45, 158, 1)">Y</span>R</a>

<section class="container d-flex gap-4">
    <div class="w-75 proprety-details">
        <p class="fw-bold text-light fs-4 text-center">Name of proprety: {{$proprety->name}}</p>
        <div class="band" style="with:10rem">
            <p class="text-light fw-bold ms-2">Price: {{$proprety->price}} Dh</p>
        </div>
        <div class="bg-sucess ms-2  mb-5">
            <p class="text-light fw-bold ms-2 d-flex gap-3">
            <i class="fa-solid fa-location-dot text-light mt-1"></i>Address: {{$proprety->address}}</p>
            <p class="text-light fw-bold ms-2 d-flex gap-3"><i class="fa-solid fa-calendar-days mt-1"></i> Duration of reservation: Minimum 1 month </p>
            <p class="text-light fw-bold ms-2 d-flex gap-3"><i class="fa-solid fa-ruler-combined" style="color: #ffffff;"></i> Surface Area: {{$proprety->surfacearea}}</p>
            <p class="text-light fw-bold ms-2 d-flex gap-3 "><i class="fa-solid fa-chair  mt-1"></i>Equiped :
            @if($proprety->equipped == 1)
                yes
            @else
                No
            @endif
            </p>
            <p class="text-light fw-bold ms-2 d-flex gap-3 "><i class="fa-solid fa-house-chimney-user" style="color: #f7f7f7;"></i>Proprety Type : {{$proprety->Housingtype->name}}</p>
            <p class="text-light fw-bold ms-2 d-flex gap-3 "><i class="fa-solid fa-hand-holding-heart" style="color: #ffffff;"></i>Benefits :</p>

            <div >
                @foreach($proprety->Specificfournitures as $benefit)
                <p class="text-light fw-bold ms-4 d-flex gap-3  "> {{$benefit->name}}</p>
                @endforeach
            </div>

        </div>

        <div class="bg-light mb-5 ">
            <p class="bg-light fw-bold">Description: {{$proprety->description}}</p>

        </div>
        <div>
        <div id="carouselExampleAutoplaying{{$proprety->id}}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($proprety->images as $indexImg => $image)
                                <div class="carousel-item {{$image->id}} {{$indexImg == 0 ? 'active' : ''}}  h-50">
                                    <img src="{{asset($image->image)}}"  class="d-block w-100 card-img-top" style="height:18rem;" alt="Rent propriety">
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
        </div>  
    </div>
    <div class="w-25 bg-light border border-light">
         <p class= "fw-bold text-center">Reservation</p>
         <hr class="mb-3">

         <form action="{{route('reservation.proprety', $proprety->id)}}" method= "post">
            @csrf
            @Method('POST')
            <div class="reservation px-3">
                    <div class="d-flex ">
                        <p class="fw-bold text-secondary-emphasis ">Resrvation: 1 month Minimum </p> 
                    </div>
                    <div class="ms-2 d-flex flex-column gap-2 mb-3 ">
                        <label  class="form-label text-dark fw-semibold">Date of start: </label>
                        <input class="date" name="started" style="height:2rem"  type="date" value="0">
                    </div> 
                    <div class="ms-2 d-flex flex-column gap-2 mb-3 ">
                        <label  class="form-label text-dark fw-semibold">Date of End :</label>
                        <input class="ended" name="ended" style="height:2rem"  type="date" value="0">
                    </div>

                    <hr class="mb-3"> 
                    <p class= "fw-bold mb-3"id="Totalprice">Total Price : </p>
                <button type="submit" class="text-light btn-add rounded  border-0 px-2 py-2 mb-5">Reserve</button>
                </form>

                
                             

            <script>

                
                
            </script>
           
         </div>
    </div>
</section>
</main>


<style>
    .logo{
        color: rgba(248, 64, 208, 1);
    }
    .proprety-details{
        background:rgba(115, 45, 158, 1);
    }
    .band{
        background:rgba(29, 9, 56, 1);
    }
    .btn-add:hover{
        color:rgba(115, 45, 158, 1);
        background-color:rgba(217, 217, 217, 1);
    }
    .btn-add{
        color:rgba(217, 217, 217, 1);
        background-color:rgba(115, 45, 158, 1);
        border-style: solid;
        border-color:rgba(217, 217, 217, 1);
    }

    .btn-soldout{
        background-color:#DC143C;
    }
    .content {
    min-height: calc(100% );
    padding-bottom: 50px; 
}

</style>



@endsection('content')



