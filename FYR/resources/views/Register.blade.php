@extends('layouts.layout')
@section('content')
<section class="register mx-5">

<a class="navbar-brand w-25 text-light fw-bold fs-1 mb-5" href="#">F<span style="color:rgba(115, 45, 158, 1)">Y</span>R</a>
<div class="d-flex justify-content-end">
<a href="" class="btn  px-5 registerbtn mb-5">Login </a>
</div>

        <div class="signupform mx-5 h-75 mb-3 ">
            <div class="my-2 mx-5 mt-5 ">
            <form class="form p-3" enctype='multipart/form-data' method="post" action="{{route('register')}}">
                @csrf
                @Method('POST')
            <div class="mb-3  ">
                <label for="exampleInputUsername" class="form-label fs-5">Full Name :</label>
                <input type="text" name="name" class=" form-control" placeholder="Example salima bouhamidi ...">
            </div>
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label fs-5">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"  placeholder="Example azerty@gmail.com..." aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fs-5">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Example AZerT55...">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label  fs-5">Reapet Password</label>
                <input type="password" class="form-control" id="repeatpassword" placeholder="Example AZerT55...">
            </div>
            <div class="mb-3">
                        <label  class="form-label text-light fw-bold">What do you want to use the app for ?</label>
                        <select name="role_id" class="role w-100 py-2 fw-bold form-control"id="role_id" >
                            <option  name="role_id" id="role_id" value="2">Looking for a roommate</option>
                            <option name="role_id" id="role_id" value="3">Renting my proprety</option>
                        </select>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-submit text-light fw-semibold px-4">Sign up</button>
            </div>
            </form>
        </div>
        </div>

    </section>
<style>
.signupform{
    color:white;

}
.signupform{
    background-image: linear-gradient(143.97deg, rgba(115, 45, 158, 1), #100b28);
    border: 1px solid rgba(170, 125, 252, .25);
    border-radius: 16px;
}
.role{
    color:rgba(115, 45, 158, 1);
}

.registerbtn, .btn-submit{
    color:rgba(115, 45, 158, 1) !important;
    background-color:rgba(217, 217, 217, 1);
    box-shadow: 0 0 15px #6f58da;
}
.registerbtn:hover, .btn-submit:hover{
    color:rgba(217, 217, 217, 1) !important;
    background-color:rgba(115, 45, 158, 1);
    border-style: solid;
    border-color:rgba(217, 217, 217, 1);
}
input::placeholder{
  font-weight: bold;
  opacity: 0.5;
  color: rgba(115, 45, 158, 1) !important;
}


</style>
@endsection('content')



