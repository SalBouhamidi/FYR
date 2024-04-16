@extends('layouts.navbar')
@section('content')
<section class="container-fluid">
    <div class="card mb-3" style="max-width: 100%;">
        <div class="row g-0">
            <div class="col-md-4">
                @if($user->image !== null)
                <img src="{{asset('storage/'.$user->image)}}" class="img-fluid rounded-start"  alt="Image of user">
                @else
                    @if($user->gender === 1)
                        <img src="{{asset('images\girl.png')}}" class="img-fluid rounded-start" alt="image of vector">
                    @elseif($user->gender === 0)
                        <img src="{{asset('images\boy.png')}}" class="img-fluid rounded-start" alt="image of vector">
                    @endif

                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-light">{{$user->name}}</h5>
                    <span class="card-title text-light ms-2 fw-semibold fs-5"><i class="fa-solid fa-address-card fa-bounce" style="color: #ffffff;"></i> About: </span>
                    @if($user->about !== null)
                    <p class="card-text ms-4 fw-semibold">{{$user->about}}</p>
                    @elseif($user->about == null)
                    <p class="card-text ms-4 fw-semibold">You must add a description to increase your matching chance</p>
                    @endif

                    <span class="card-title text-light ms-2 fw-semibold fs-5"><i class="fa-solid fa-venus-mars" style="color: #f7f7f7;"></i> Gender: </span>
                    @if($user->gender === 0)
                    <p class="card-text ms-4 fw-semibold">Male</p>
                    @elseif($user->gender === 1)
                    <p class="card-text ms-4 fw-semibold">Female</p>
                    @endif


                    <span class="card-title text-light ms-2 fw-semibold fs-5"><i class="fa-solid fa-location-dot" style="color: #f2f2f2;"></i> Location: </span>
                    @if($user->localisation !== null)
                    <p class="card-text ms-4 fw-semibold">{{$user->localisation}}</p>
                    @elseif($user->localisation === null)
                    <p class="card-text ms-4 fw-semibold">Your address will help to increase chances of finding your roommate</p>
                    @endif

                    <span class="card-title text-light ms-2 fw-semibold fs-5"><i class="fa-regular fa-address-book" style="color: #ffffff;"></i> Contact: </span>
                    @if($user->phone !== null)
                    <p class="card-text  ms-4 fw-bold" style="color: #000000;"><i class="fa-solid fa-phone" style="color: #000000;"></i> Your phone : {{$user->phone}}</p>
                    @elseif($user->phone == null)
                    <p class="card-text  ms-4 fw-bold" style="color: #000000;"><i class="fa-solid fa-phone" style="color: #000000;"></i> Your phone: Add your phone number to make it easy on Roommate to contact you</p>
                    @endif
                    <p class="card-text  ms-4 fw-bold" style="color: #000000;"><i class="fa-solid fa-envelope" style="color: #000000;"></i> Email : {{$user->email}}</p>
                    @if($user->whatssap !== null)
                    <p class="card-text ms-4 fw-bold"  style="color: #000000;"><i class="fa-solid fa-phone" style="color: #000000;"></i> Your whatssap : {{$user->whatssap}}</p>
                    @elseif($user->phone == null)
                    <p class="card-text ms-4 fw-bold"  style="color: #000000;"><i class="fa-solid fa-phone" style="color: #000000;"></i> Your whatssap : Add your whatssap number to make it easy on Roommate to contact you</p>
                    @endif
           
                    <!-- Button trigger modal -->
            <button type="button" class="btn btn-update" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}">
                <i class="fa-solid fa-pen"></i> Update
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-light fs-5 d-flex " id="exampleModalLabel"> Modify Your profil</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            
                        <form class="form p-3" enctype='multipart/form-data' method="post" action="{{route('update.profil', $user->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3  ">
                                <label  class="form-label fw-bold text-light">Full Name :</label>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}" >
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3  ">
                                <label for="exampleInputUsername" class="form-label fw-bold text-light">About :</label>
                                <input type="text" name="about" class="form-control" value="{{$user->about}}">
                                @error('about')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 ">
                                <label for="exampleInputEmail1" class="form-label fw-bold text-light">Email address</label>
                                <input type="email" name="email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3  ">
                                <label  class="form-label fw-bold text-light">Location:</label>
                                <input type="text" name="localisation" value="{{$user->localisation}}" class=" form-control" >
                            </div>
                            <div class="mb-3  ">
                                <label  class="form-label fw-bold text-light">Number:</label>
                                <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
                                @error('phone')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3  ">
                                <label  class="form-label fw-bold text-light">Whatssap number:</label>
                                <input type="text" name="whatssap" class="form-control" value="{{$user->whatssap}}" >
                            </div>
                            <div class="mb-3">
                                <label  class="form-label fw-bold text-light">Image</label>
                                <input type="file" name="image" class="form-control" value="{{$user->image}}" >
                            </div>
                                                      
                            <div class="mb-3">
                                        <label  class="form-label text-light fw-bold">What's your gender</label>
                                        <select name="gender" value="{{$user->gender}}" class="role w-100 py-2 text-secondary fw-bold form-control"id="gender" >
                                            <option value="0" @if($user->gender == 0) selected @endif >Man</option>
                                            <option value="1" @if($user->gender == 1) selected @endif>Female</option>
                                        </select>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-submit text-light fw-semibold px-4"  name="submit">Sign up</button>
                            </div>
                            </form>




                        </div>
                      
                    </div>
                </div>
            </div>

   





        

    </div>

</section>

<style>
    .card{
        background-color:rgba(115, 45, 158, 1);

    }
    .btn-update{
        color:rgba(115, 45, 158, 1) !important;
        background-color:rgba(217, 217, 217, 1);
        box-shadow: 0 0 15px #6f58da;
    }

    .btn-update:hover{
        color:rgba(217, 217, 217, 1) !important;
        background-color:rgba(115, 45, 158, 1);
        border-style: solid;
        border-color:rgba(217, 217, 217, 1);
    }
    .modal-content{
        background-color:rgba(115, 45, 158, 1);
    }
</style>

@endsection('content')