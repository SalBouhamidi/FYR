@extends('layouts.navbar')
@section('content')

<!-- <h1 class="text-light">home</h1> -->
<section class="hero-section container-fluid mb-5">
            <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{asset('images/rhil.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{asset('images/chillinghome.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{asset('images/mask.jpg')}}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>

</section>
<section class="navbarsearch mb-3">
        <nav class="navbar navbarsearch">
        <div class="container-fluid w-100 d-flex  justify-content-around flex-row">
            <a class="navbar-brand text-wrap text-light fw-semibold w-25">Find roommates and room that match your life style</a>
            <form class="d-flex w-50" role="search">
                <input class="form-control me-2" type="search" placeholder="|| Search" aria-label="Search">
                <button class="btn btn_search" type="submit">Search</button>
            </form>
                    <a href="" class="text-light fw-semibold text-decoration-none">Home</a>
                    <a href="" class="text-light fw-semibold text-decoration-none">Rommates</a>
       
        </div>
        </nav>

</section>

<section class="attractivesection container-fluid w-100 d-flex justify-content-between mb-5">
    <div class="attractivesection_image">
        <img class=" img-fluid" src="{{asset('images/mask.jpg')}}" alt="">
    </div>
    <div class="attractivesection_text w-75 me-3 d-flex align-items-center justify-content-center flex-column">
        <p class="text-center fw-bold text-light fs-4">Find the perfect Home or Roommates 
        </p>
        <p class="text-center fw-bold text-light fs-4">
        that match perfectly with your style.
        </p>
    </div>
    <div class="attractivesection_image">
        <img  class="img-fluid" src="{{asset('images/cooking.jpg')}}" alt="">
    </div>
</section>

<section class="findRommate container-fluid mb-5">
        <div class="text-light d-flex justify-content-between ">
            <h5>Find a Roommate</h5>
            <p class="fw-bold text-decoration-underline ">See more</p>
        </div>

        <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>

</section>

<section class="findhome container-fluid mb-5">
        <div class="text-light d-flex justify-content-between ">
            <h5>Find your Home : </h5>
            <p class="fw-bold text-decoration-underline ">See more</p>
        </div>

        <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>

</section>
<section class="endingtext mt-3 w-100 d-flex justify-content-center mb-5">
        <div class="w-75">
            <p class="fw-bold text-light fs-2 text-center">Let F<span class="spanLogo">Y</span>R help you to find the Best Roommate that match your 
        lifestyle Or help you to find the perfect Home that matches
        your needs.</p>

        </div>
    

</section>




<style>
    .navbarsearch{
        background: linear-gradient(rgba(115, 45, 158, 1), rgba(0, 0, 0, 1));
    }
    .btn_search{
        color:rgba(115, 45, 158, 1);
        background-color:rgba(217, 217, 217, 1);
    }
    .btn_search:hover{
        color:rgba(217, 217, 217, 1);
        background-color:rgba(115, 45, 158, 1);
        border-style: solid;
        border-color:rgba(217, 217, 217, 1);
    }
    .form-control{
        background-color:rgba(217, 217, 217, 1);

    }
    .attractivesection_image{
        width:50%;
    }
    .spanLogo{
        color:rgba(115, 45, 158, 1);
    }
</style>


@endsection('content')