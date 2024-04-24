@extends('layouts.navbar')
@section('content')

<main class="contentRoommate container">

<a class="navbar-brand w-25 text-light fw-bold fs-4 ms-2" href="#">Welcome to F<span style="color:rgba(115, 45, 158, 1)">Y</span>R</a>

<section class="Roommatedescription container d-flex gap-4">
    <div class="w-75 proprety-details">
        <p class="fw-bold text-light fs-4 text-center">Name of roommate: {{$roommate->user->name}}</p>
        <div class="band" style="with:10rem">
            <p class="text-light fw-bold ms-2"><i class="fa-solid fa-dollar-sign" style="color: #f7f7f7;"></i> Budget: {{$roommate->budget}} Dh</p>
        </div>
        <div class="bg-sucess ms-2  mb-5">
            <p class="text-light fw-bold ms-2 d-flex gap-3">
            <i class="fa-solid fa-location-dot text-light mt-1"></i>Address: {{$roommate->address}}, {{$roommate->citie->name}}</p>
            <p class="text-light fw-bold ms-2 d-flex gap-3"><i class="fa-solid fa-users" style="color: #ffffff;"></i>Number of roommate desired: {{$roommate->numberofroommates}}</p>
            <p class="text-light fw-bold ms-2 d-flex gap-3"><i class="fa-solid fa-paw fa-bounce" style="color: #f0f0f0;"></i>Petperson: {{ $roommate->petperson == 1 ? 'Yes' : 'No' }}  </p>
            <p class="text-light fw-bold ms-2 d-flex gap-3 "><i class="fa-solid fa-smoking fa-fade" style="color: #ffffff;"></i>Smoker: {{ $roommate->smoker == 1 ? 'Yes' : 'No' }}
            <p class="text-light fw-bold ms-2 d-flex gap-3 "><i class="fa-solid fa-venus-mars" style="color: #ffffff;"></i>Gender: {{ $roommate->gender == 1 ? 'Female' : 'Male' }}


            </p>
            <p class="text-light fw-bold ms-2 d-flex gap-3 "><i class="fa-solid fa-house-chimney-user" style="color: #f7f7f7;"></i>Proprety Type : {{$roommate->housingtype->name}}</p>
            <p class="text-light fw-bold ms-2 d-flex gap-3 "><i class="fa-solid fa-hand-holding-heart" style="color: #ffffff;"></i>Posted on: {{$roommate->created_at->diffForHumans()}}</p>

        </div>

            <div class="bg-light mb-5 d-flex justify-content-center">
                <p class="bg-light text-danger fw-bold">Attention: Make sure to take her or his Id's information before moving to live with them </p>
            </div>
            <div class='d-flex justify-content-center'>
                @if($roommate->user->image !== null)
                    <img src="{{asset('storage/'.$roommate->user->image)}}" class="img-fluid rounded-start h-100"  alt="Image of user">
                @else
                    @if($roommate->gender == 1)
                        <img src="{{asset('images/girl.png')}}" class="img-fluid" alt="">
                    @elseif($roommate->gender == 0)
                        <img src="{{asset('images/boy.png')}}" class="img-fluid" alt="">
                @endif
                @endif
              

            </div>  
    </div>       
    <div class="contantsection h-25 bg-light border border-light" style="width:20rem">
        <p class= "fw-bold text-center mb-5">Contact</p>
        <div class="d-flex flex-row "><p class="card-text ms-2 fw-bold text-light" ><i class="fa-brands fa-whatsapp fw-bold" style="color: #32e42f;"></i> Whatssap:</p><a class="card-text ms-4 fw-bold text-decoration-none text-light" target="_blank" style="color: #000000;" href="https://wa.me/{{$roommate->user->whatssap}}">{{$roommate->user->whatssap == null ? 'Not avialable': $roommate->user->whatssap }}</a></div>
        <p class="card-text fw-bold ms-1 text-light"  ><i class="fa-solid fa-phone-volume" style="color: #000000;"></i> Telephone : {{$roommate->user->phone == null ? 'Not avialble': $roommate->user->phone}}</a></p>
        <p class="card-text fw-bold ms-1 text-light"  style="color: #000000;"><i class="fa-solid fa-envelope" style="color: #000000;"></i> Email: {{$roommate->user->email}}</a></p>
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
    .contantsection{
        background:linear-gradient(rgba(115, 45, 158, 1), rgba(0, 0, 0, 1));
    }


@media (max-width:600px){
    .decorationimg{
            display:none;
    }
    .Roommatedescription{
        flex-direction: column;
        width:100%
    }
    .proprety-details{
        width:100% !important;
    }
    .contantsection{
        width:100% !important;
        background:linear-gradient(rgba(115, 45, 158, 1), rgba(0, 0, 0, 1));
    }

}

</style>



@endsection('content')



