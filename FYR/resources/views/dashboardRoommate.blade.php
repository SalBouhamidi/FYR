@extends('layouts.navbar')
@section('content')


<!-- <h1>dahsboard roomates</h1> -->
<main class="content ">
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


        <section class="RoommateOffer">
           <div class="d-flex justify-content-end me-5 mb-4">
                <a href="{{route('addOffer')}}" class="btn  px-5 addoffer">Add New Offer </a>


                

                
            </div>
            <div class="content container-fluid">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-light">Card title</h5>
                                    <p class="card-text  text-light fw-bold">Some quick example text </p>
                                    <p class="card-text  text-light fw-bold">Some quick example text </p>
                                    <button href="" class="btn addoffer">Inactive</button>
                                    <a href="#" class="btn addoffer">Modify</a>
                                    <a href="#" class="btn addoffer">Delete</a>
                                </div>
                            </div>



            </div>
        </section>

</main>

<style>
.content {
    min-height: calc(100% ); /* Adjust 50px to match your footer height */
    padding-bottom: 50px; /* Same as footer height */
}
.navbarsearch{
        background: linear-gradient(rgba(115, 45, 158, 1), rgba(0, 0, 0, 1));
}

.btn_search, .addoffer{
    color:rgba(115, 45, 158, 1);
    background-color:rgba(217, 217, 217, 1);
}
.btn_search:hover, .addoffer:hover{
    color:rgba(217, 217, 217, 1);
    background-color:rgba(115, 45, 158, 1);
    border-style: solid;
    border-color:rgba(217, 217, 217, 1);
}
.form-control{
    background-color:rgba(217, 217, 217, 1);

}
.RoommateOffer{
    min-height: 150vh;
}
.card{
    background-color:rgba(115, 45, 158, 1);

}
</style>

@endsection('content')