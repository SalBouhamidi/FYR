@extends('layouts.navbar')
@section('content')


<section class="UpdateOffer container">

    <h3 class="text-light text-center text-decoration-underline">Let's Update your Roommate Offer!</h3>
    @if(session('Errorupdate'))
    <div class="alert alert-danger" role="alert">
        Something went wrong please try again
    </div>
    @endif
    <div class="d-flex">


    <div class="w-50">
    
            <form class="container" action="{{route('dashboardRoommates.update',$offer->id )}}" method="post">
                    @csrf
                    @Method('Put')
                    <div class="mb-3">
                        <label  class="form-label text-light fw-bold">City :</label>
                        <select name="citie_id" class="w-100 py-2" id="citie_id">
                            @foreach($cities as $city)
                            <option name="citie_id" value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>

                      <div class="mb-3">
                        <label  class="form-label text-light fw-bold">Desired area to live :</label>
                        <input type="text" name="address" value="{{$offer->address}}" class="form-control" placeholder="Neighborhood" >

                      </div>

                      <div class="mb-3">
                        <label  class="form-label text-light fw-bold">Housing Type :</label>
                        <select name="housingtype_id" class="w-100 py-2" id="housingtype_id">
                        @foreach($housingtypes as $housingtype)
                            <option name="housingtype_id" value="{{$housingtype->id}}">{{$housingtype->name}}</option>
                        @endforeach
                        </select>
                    </div>
                      
                        <div class="mb-3">
                            <label  class="form-label text-light fw-bold " >Type of Room desire :</label>
                                <div class="ms-5">
                                <input type="radio" id="roomtype" name="roomtype"  value="1">
                                <label for="html" class="text-light"  >Separate Room</label><br>
                                <input type="radio" id="roomtype" name="roomtype" value="0">
                                <label for="html" class="text-light">Shared Room</label><br>
                                <input type="radio" id="roomtype" name="roomtype" value="">
                                <label for="html" class="text-light">It doesn't matter</label><br>
                                </div>
                        </div>

                        <div class="mb-3">
                        <label  class="form-label text-light fw-bold">Your Budget in MAD :</label>
                        <input type="number" name="budget" class="form-control" value="{{$offer->budget}}" placeholder="Your budget" >
                        </div>

                        <div class="mb-3">
                        <label class="form-label text-light fw-bold">How many Roommates you are looking for ?</label>
                        <input type="number" name="numberofroommates" value="{{$offer->numberofroommates}}" class="form-control" placeholder="Number of roommates desired" >
                        </div>

                        <div class="mb-3">
                        <label  class="form-label text-light fw-bold">Would you be comfortable living with someone who has a pet ?</label>
                        <select name="petperson" class="w-100 py-2"id="petperson">
                            <option  value="1">Yes</option>
                            <option  value="0">No</option>
                        </select>
                        </div>

                        <div class="mb-3">
                        <label  class="form-label text-light fw-bold">Are you okay with living with someone who smokes ?</label>
                        <select name="smoker" class="w-100 py-2" id="smoker">
                            <option  value="1">Yes</option>
                            <option  value="0">No</option>
                        </select>
                        </div>

                        <div class="mb-3">
                        <label  class="form-label text-light fw-bold">Gender preference for roommate :</label>
                        <select name="gender" class="w-100 py-2"id="gender">
                            <option  value="0">Male</option>
                            <option  value="1">Female</option>
                        </select>
                        </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-submit mb-4 ms-5 px-5">Submit</button>
                </div>
            </form>

            </div>

            <div class="w-50 mt-5">
                <p class="text-light text-center mt-5">Hey make Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus, ex. Ex doloremque repellendus quos ipsam delectus optio suscipit, tempora, excepturi libero accusamus quibusdam? Tempore porro tempora, vitae molestiae corrupti dolor.</p>
                <img src="{{asset('images/curiosity.png')}}" class="img-fluid" alt="">

            </div>

            </div>

</section>

<style>
    .UpdateOffer{
    min-height: 100vh;
    background-color:rgba(115, 45, 158, 1);
    box-shadow: 0px 5px 60px 0px rgba(217, 217, 217, 1), 0 6px 20px 0 rgba(255, 255, 255, 0.19);

    }
    .btn-submit{
        color:rgba(115, 45, 158, 1);
        background-color:rgba(217, 217, 217, 1);
    }
    .btn-submit:hover{
        color:rgba(217, 217, 217, 1);
        background-color:rgba(115, 45, 158, 1);
        border-style: solid;
        border-color:rgba(217, 217, 217, 1);
    }
    .UpdateOffer form input, .UpdateOffer form select{
        background-color:rgba(240, 240, 240, 1);
    }
</style>
@endsection('content')

