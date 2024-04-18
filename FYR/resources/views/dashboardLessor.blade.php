@extends('layouts.navbar')
@section('content')
    <main class="content ">
        <section class="navbarsearch mb-3">
            <nav class="navbar navbarsearch">
                <div class="container-fluid w-100 d-flex  justify-content-around flex-row">
                    <a class="navbar-brand text-wrap text-light fw-semibold w-25">Find roommates and room that match your
                        life style</a>
                    <form class="d-flex w-50" role="search">
                        <input class="form-control me-2" type="search" placeholder="|| Search" aria-label="Search">
                        <button class="btn btn_search" type="submit">Search</button>
                    </form>
                    <a href="" class="text-light fw-semibold text-decoration-none">Home</a>
                    <a href="" class="text-light fw-semibold text-decoration-none">Rommates</a>
                </div>
            </nav>

        </section>


        <section class="RoommateOffer">
            <div class="d-flex justify-content-end me-5 mb-4 gap-2">
                <a href="{{ route('dashboardLessor.create') }}" class="btn  px-5 addoffer">Add New Offer </a>
                <a href="{{ route('show.profil') }}" class="btn  px-5 addoffer">View my profil </a>

            </div>
            <div class="content container-fluid d-flex flex-wrap gap-5 justify-content-center">

                @foreach ($proporeties as $proprety)
                    <div class="card" style="width: 21rem;">


                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="..." class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="..." class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="..." class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>




                        <img src="{{ asset('images\girl.png') }}" class="card-img-top" alt="...">




                        <div class="card-body">
                            <h5 class="card-title text-light">{{ $proprety->name }}</h5>
                            <p class="card-text  text-light fw-bold">Address: {{ $proprety->address }}</p>
                            <p class="card-text  text-light fw-bold ">Price: {{ $proprety->price }}</p>
                            <div class="d-flex justify-content-between">
                                <form method="post" action="">
                                    <button type="submit" class="btn addoffer"><i class="fa-solid fa-circle fa-fade"
                                            style="color: #03dd9c;"></i> Active</button>
                                </form>
                                <a href="" class="btn addoffer px-4">Modify</a>
                                <form action="" method="POST">
                                    <button type="submit" class="btn addoffer px-4">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach


                <!-- <div>
                        <p>there's no offer yet</p>
                        </div> -->



            </div>
        </section>

    </main>

    </section>


    <style>
        .content {
            min-height: calc(100%);
            /* Adjust 50px to match your footer height */
            padding-bottom: 50px;
            /* Same as footer height */
        }

        .navbarsearch {
            background: linear-gradient(rgba(115, 45, 158, 1), rgba(0, 0, 0, 1));
        }

        .btn_search,
        .addoffer {
            color: rgba(115, 45, 158, 1);
            background-color: rgba(217, 217, 217, 1);
            box-shadow: 0 0 15px #6f58da;

        }

        .btn_search:hover,
        .addoffer:hover {
            color: rgba(217, 217, 217, 1);
            background-color: rgba(115, 45, 158, 1);
            border-style: solid;
            border-color: rgba(217, 217, 217, 1);
        }

        .form-control {
            background-color: rgba(217, 217, 217, 1);

        }

        .RoommateOffer {
            min-height: 150vh;
        }

        .card {
            background-color: rgba(115, 45, 158, 1);
            transform: scale(1);

        }

        .card:hover {
            transform: scale(1.05);
            border-style: solid;
            border-color: rgba(217, 217, 217, 1);
        }
    </style>
@endsection('content')
