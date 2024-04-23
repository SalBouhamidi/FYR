@extends('layouts.navbar')
@section('content')

<main class="content container">

<a class="navbar-brand w-25 text-light fw-bold fs-4 ms-2" href="#">Welcome to F<span style="color:rgba(115, 45, 158, 1)">Y</span>R</a>

<section class="container d-flex gap-4">
    <div class="w-75 proprety-details">
        <p class="fw-bold text-light fs-4 text-center">Name of roommate: </p>
        <div class="band" style="with:10rem">
            <p class="text-light fw-bold ms-2">budget:  Dh</p>
        </div>
        <div class="bg-sucess ms-2  mb-5">
            <p class="text-light fw-bold ms-2 d-flex gap-3">
            <i class="fa-solid fa-location-dot text-light mt-1"></i>Address: </p>
            <p class="text-light fw-bold ms-2 d-flex gap-3"><i class="fa-solid fa-calendar-days mt-1"></i> duration of reservation: Minimum 1 month </p>
            <p class="text-light fw-bold ms-2 d-flex gap-3"><i class="fa-solid fa-ruler-combined" style="color: #ffffff;"></i> Surface Area: </p>
            <p class="text-light fw-bold ms-2 d-flex gap-3 "><i class="fa-solid fa-chair  mt-1"></i>Equiped :

            </p>
            <p class="text-light fw-bold ms-2 d-flex gap-3 "><i class="fa-solid fa-house-chimney-user" style="color: #f7f7f7;"></i>Proprety Type : </p>
            <p class="text-light fw-bold ms-2 d-flex gap-3 "><i class="fa-solid fa-hand-holding-heart" style="color: #ffffff;"></i>Benefits :</p>

            <div>
                <p class="text-light fw-bold ms-4 d-flex gap-3  "> dd</p>
            </div>

        </div>

            <div class="bg-light mb-5 ">
                <p class="bg-light fw-bold">Description: </p>
            </div>
            <div class='d-flex justify-content-center'>
                <img src="{{asset('images/girl.png')}}" alt="">
            </div>  
    </div>       
    <div class="w-25 bg-light border border-light">
         <p class= "fw-bold text-center">Contact</p>
         <hr class="mb-3">        
                             

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



