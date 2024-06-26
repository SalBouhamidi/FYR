@extends('layouts.navbar')
@section('content')

<section class="AddOffer container">

    <h3 class="text-light text-center text-decoration-underline">Let's Modify your proprety!</h3>

    <div class="d-flex">

    <div class="w-50">

    @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
            <form class="container" enctype='multipart/form-data'  action="{{route('dashboardLessor.update',$proporetie->id)}}" method="post">
                    @csrf
                    @Method('PUT')
                    <div class="mb-3">
                        <label  class="form-label text-light fw-bold"><i class="fa-solid fa-house-user" style="color: #fbfcfe;"></i> Name of your proprety:</label>
                        <input type="text" name="name" value="{{$proporetie->name}}" class="form-control" placeholder="proprety's name" >
                    </div>
                    @error('name')
                    <div class="alert alert-danger" role="alert">
                       {{$message}}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label  class="form-label text-light fw-bold"><i class="fa-solid fa-audio-description" style="color: #ffffff;"></i> Description:</label>
                        <input type="text" name="description" value="{{$proporetie->description}}" class="form-control" placeholder="Description of your proprety" >
                    </div>
                    @error('description')
                    <div class="alert alert-danger" role="alert">
                       {{$message}}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label  class="form-label text-light fw-bold"><i class="fa-solid fa-location-dot" style="color: #fafcff;"></i> Address :</label>
                        <input type="text" name="address" value="{{$proporetie->address}}" class="form-control" placeholder="address" >
                    </div>
                    @error('address')
                    <div class="alert alert-danger " role="alert">
                       {{$message}}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label  class="form-label text-light fw-bold">
                        <i class="fa-solid fa-dollar-sign"></i> Price :</label>
                        <input type="float" name="price"  value="{{$proporetie->price}}" class="form-control" placeholder="price" >
                    </div>

                    @error('price')
                    <div class="alert alert-danger" role="alert">
                       {{$message}}
                    </div>
                    @enderror
                    

                    <div class="mb-3">
                        <label  class="form-label text-light fw-bold"><i class="fa-solid fa-chair" style="color: #fafafa;"></i> Is your proprety equipped?</label>
                        <select name="equipped" class="w-100 py-2"   id="equipped">
                            <option  value="0" @if($proporetie->equipped == 0) selected @endif  >No</option>
                            <option  value="1" @if($proporetie->equipped == 1) selected @endif >Yes</option>
                        </select>
                    </div>
                    @error('equipped')
                    <div class="alert alert-danger" role="alert">
                       {{$message}}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label  class="form-label text-light fw-bold"><i class="fa-solid fa-ruler-combined" style="color: #ffffff;"></i> Surface area of your proprety :</label>
                        <input type="number" name="surfacearea" value="{{$proporetie->surfacearea}}" class="form-control" placeholder="surfacearea" >
                    </div>
                    @error('surfacearea')
                    <div class="alert alert-danger" role="alert">
                       {{$message}}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label  class="form-label text-light fw-bold"><i class="fa-solid fa-building" style="color: #ffffff;"></i> City :</label>
                        <select name="citie_id" class="w-100 py-2"  id="citie_id">
                            @foreach($cities as $city)
                            <option value="{{$proporetie->citie_id}}" name="citie_id"  @if($proporetie->citie_id == $city->id) selected @endif > {{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('citie_id')
                    <div class="alert alert-danger" role="alert">
                       {{$message}}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label  class="form-label text-light fw-bold"><i class="fa-solid fa-house-chimney-user" style="color: #f7f7f7;"></i> Housing :</label>
                        <select name="housingtype_id" class="w-100 py-2" value="{{$proporetie->housingtype_id}}" id="housingtype_id">
                            @foreach($houstingTypes as $houstingtype)
                            <option name="housingtype_id"  value="{{$houstingtype->id}}" @if($proporetie->housingtype_id == $houstingtype->id) selected @endif>{{$houstingtype->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('housingtype_id')
                    <div class="alert alert-danger" role="alert">
                       {{$message}}
                    </div>
                    @enderror

                    <div class="mb-3">

                        <label  class="form-label text-light fw-bold"><i class="fa-solid fa-house-chimney-user" style="color: #f7f7f7;"></i> Special features :</label>
                        @foreach($specialFournitures as $specialFourniture)
                        <div>
                            <input class="text-light" type="checkbox" name="specialFournitures[]"  id="{{$specialFourniture->id}}" value="{{$specialFourniture->id}}"  multiple @if($fournituresofPropritie->contains('specificfourniture_id',$specialFourniture->id)) checked @endif />
                            <label class="text-light fw-bold" for="{{$specialFourniture->id}}"  name="specialFournitures">{{$specialFourniture->name}}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label  class="form-label text-light fw-bold"><i class="fa-solid fa-house-chimney-user" style="color: #f7f7f7;"></i> Housing :</label>
                        <select name="housingtype_id" class="w-100 py-2" value="{{$proporetie->housingtype_id}}" id="housingtype_id">
                            @foreach($houstingTypes as $houstingtype)
                            <option name="housingtype_id"  value="{{$houstingtype->id}}" @if($proporetie->housingtype_id == $houstingtype->id) selected @endif>{{$houstingtype->name}}</option>
                            @endforeach
                        </select>
                    </div>
         
                 
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-submit mb-4 ms-5 px-5">Submit</button>
                </div>
            </form>

            </div>

            <div class="w-50 mt-5 ">
                <img src="{{asset('images/rent.png')}}" class="img-fluid" alt="Renting home image">
            </div>
            

            </div>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</section>
<script>

</script>

<style>
    .AddOffer{
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
    .AddOffer form input, .AddOffer form select{
        background-color:rgba(240, 240, 240, 1);
        /* color:#D8BFD8; */
        /* rgba(240, 240, 240, 1) */
        /* rgba(180, 180, 180, 1) */
    }
</style>
@endsection('content')

