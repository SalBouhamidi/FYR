@extends('layouts.navbar')
@section('content')




<!-- <h1>add content</h1> -->

<section class="AddOffer container">

    <h3 class="text-light text-center text-decoration-underline">Let's find you a Roommate !</h3>

            <form class="container">
                        
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
                        <input type="text" name="address" class="form-control" placeholder="Neighborhood" >

                      </div>

                      <div class="mb-3">
                        <label  class="form-label text-light fw-bold">Housing Type :</label>
                        <select name="categorie_id" class="w-100 py-2"id="status_auto">
                        @foreach($housingtypes as $housingtype)
                            <option name="categorie_id" value="{$housingtype->id}}">{{$housingtype->name}}</option>
                        @endforeach
                        </select>
                    </div>

                      
                        <div class="mb-3">
                            <label  class="form-label text-light fw-bold ">Type of Room desire :</label>
                                <div class="ms-5">
                                <input type="radio" id="roomtype" name="roomtype" value="Individualle">
                                <label for="html" class="text-light"  >Separate Room</label><br>
                                <input type="radio" id="Partagée" name="Partagée" value="Partagée">
                                <label for="html" class="text-light">Shared Room</label><br>
                                <input type="radio" id="Partagée" name="Partagée" value="Partagée">
                                <label for="html" class="text-light">It doesn't matter</label><br>
                                </div>
                        </div>

                        <div class="mb-3">
                        <label  class="form-label text-light fw-bold">Your Budget in MAD :</label>
                        <input type="float" class="form-control" placeholder="Your budget" >
                        </div>

                        <div class="mb-3">
                        <label class="form-label text-light fw-bold">How many Roommates you are looking for ?</label>
                        <input type="number" class="form-control" placeholder="Number of roommates desired" >
                        </div>

                        <div class="mb-3">
                        <label  class="form-label text-light fw-bold">Would you be comfortable living with someone who has a pet ?</label>
                        <select name="categorie_id" class="w-100 py-2"id="status_auto">
                            <option name="categorie_id" value="">Yes</option>
                            <option name="categorie_id" value="">No</option>
                        </select>
                        </div>

                        <div class="mb-3">
                        <label  class="form-label text-light fw-bold">Are you okay with living with someone who smokes ?</label>
                        <select name="categorie_id" class="w-100 py-2"id="status_auto">
                            <option name="categorie_id" value="">Yes</option>
                            <option name="categorie_id" value="">No</option>
                        </select>
                        </div>

                        <div class="mb-3">
                        <label  class="form-label text-light fw-bold">Gender preference for roommate :</label>
                        <select name="categorie_id" class="w-100 py-2"id="status_auto">
                            <option name="categorie_id" value="">Female</option>
                            <option name="categorie_id" value="">Male</option>
                        </select>
                        </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-submit mb-4 ms-5 px-5">Submit</button>
                </div>
            </form>

</section>


<style>
    .AddOffer{
    min-height: 100vh;
    background-color:rgba(115, 45, 158, 1);
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
    .AddOffer form input, .AddOffer form select{
        background-color:rgba(240, 240, 240, 1);
        /* color:#D8BFD8; */
        /* rgba(240, 240, 240, 1) */
        /* rgba(180, 180, 180, 1) */
    }
</style>
@endsection('content')

