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
           <div class="d-flex justify-content-end me-5 mb-4 gap-2">
                <a href="{{route('dashboardRoommates.create')}}" class="btn  px-5 addoffer">Add New Offer </a>
                <a href="" class="btn  px-5 addoffer">View my profil </a>

            </div>
            <div class="content container-fluid d-flex flex-wrap gap-5 justify-content-center">
                @if($roommateOffers !== null)
                        @foreach($roommateOffers as $offer)
                            <div class="card" style="width: 21rem;">

                            @if($user->gender === 0)
                                <img src="{{asset('images\boy.jpg')}}" class="card-img-top" alt="...">
                            @elseif($user->gender === 1)
                                <img src="{{asset('images\girl.jpg')}}" class="card-img-top" alt="...">
                            @endif
                                <div class="card-body">
                                    
                                    <h5 class="card-title text-light">{{$user->name}}</h5>
                                    <p class="card-text  text-light fw-bold">Budget:{{$offer->budget}} Dh</p>
                                    @foreach($cities as $city)
                                        @if($offer->citie_id == $city->id)
                                            <p class="card-text  text-light fw-bold ">City:{{$city->name}}</p>
                                        @endif
                                    @endforeach
                                    <div class="d-flex justify-content-between">
                                    <form method="post" action="{{route('dashboardRoommates.activation', $offer->id)}}">
                                        @csrf
                                        @Method('Put')
                                        @if($offer->isactive == 1)
                                        <button type="submit" class="btn addoffer"><i class="fa-solid fa-circle fa-fade" style="color: #03dd9c;"></i> Active</button>
                                        @elseif($offer->isactive === 0)
                                        <button type="submit" class="btn addoffer"><i class="fa-solid fa-circle fa-fade" style="color: #f50049;"></i> Inactive</button>
                                        @endif

                                    </form>


                                    <a href="{{ route('dashboardRoommates.edit', $offer->id)}}" class="btn addoffer px-4">Modify</a>
                                    <form action="{{ route('dashboardRoommates.destroy', $offer->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn addoffer px-4">Delete</button>
                                    </form>
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
        </section>

</main>

</section>


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
    box-shadow: 0 0 15px #6f58da;

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
    transform: scale(1);

}

.card:hover{
    transform: scale(1.05);
    border-style: solid;
    border-color:rgba(217, 217, 217, 1);
}
</style>


@endsection('content')