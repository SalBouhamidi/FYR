@extends('layouts.layout')
@section('content')
<section class="register mx-5">

<a class="navbar-brand w-25 text-light fw-bold fs-1 mb-5" href="#">F<span style="color:rgba(115, 45, 158, 1)">Y</span>R</a>
<div class="d-flex justify-content-end">
<a href="{{route('loginview')}}" class="btn  px-5 registerbtn mb-5">Login </a>
</div>

        <div class="signupform mx-5 h-75 mb-3 ">
            <div class="my-2 mx-5 mt-5 ">
            <form class="form p-3" id="form" enctype='multipart/form-data' method="post" action="{{route('register')}}">
                @csrf
                @Method('POST')
            <div class="mb-3  ">
                <label for="exampleInputUsername" class="form-label fs-5">Full Name :</label>
                <input type="text" id="fullname" name="name" class="form-control" placeholder="Example salima bouhamidi ...">
                <span class="text-danger" id="nameError"></span>
            </div>
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label fs-5">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"  placeholder="Example azerty@gmail.com..." aria-describedby="emailHelp">
                <span class="text-danger" id="emailError"></span>
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fs-5">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Example AZerT55...">
                <span class="text-danger" id="passwordError"></span>

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label  fs-5">Reapet Password</label>
                <input type="password" class="form-control" id="repeatpassword" placeholder="Example AZerT55...">
                <span class="text-danger" id="passwordconfirmation"></span>

            </div>
            <div class="mb-3">
                        <label  class="form-label text-light fw-bold">What do you want to use the app for ?</label>
                        <select name="role_id" class="role w-100 py-2 fw-bold form-control"id="role_id" >
                            <option  name="role_id" id="role_id" value="2">Looking for a roommate</option>
                            <option name="role_id" id="role_id" value="3">Renting my proprety</option>
                        </select>
            </div>
            <div class="mb-3">
                        <label  class="form-label text-light fw-bold">Your gender:</label>
                        <select name="gender" class="role w-100 py-2 fw-bold form-control"id="gender" >
                            <option  name="gender"  value="0">Man</option>
                            <option name="gender"   value="1">Female</option>
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
<script>
        document.addEventListener("DOMContentLoaded", function() {
        let form = document.getElementById('form');
        let nameError= document.getElementById('nameError');
        let emailError= document.getElementById('emailError');
        let passwordError= document.getElementById('passwordError');
        let passwordConfError = document.getElementById('passwordconfirmation');



        var regexEmail= /^\S+@\S+\.\S+$/;


        form.addEventListener('input',(e) =>
        {
            console.log('hello');
            let userName = document.getElementById('fullname').value;
            if(userName.trim() == "" || userName=="" || userName.length< 2){
                nameError.innerHTML = "Name is not valid";
                document.getElementById('fullname').style.border = "2px solid red";
            }else{
                nameError.innerHTML = "";
                document.getElementById('fullname').style.border = "2px solid green";
            }

            let email = document.getElementById('exampleInputEmail1').value;
            if(email.trim() === "" || !email.match(regexEmail) || email == ""){
                emailError.innerHTML = "Email is not Valid";
                document.getElementById("exampleInputEmail1").style.border= "2px solid red"
            }else{
                emailError.innerHTML = "";
                document.getElementById("exampleInputEmail1").style.border= "2px solid green"
            }

            let password = document.getElementById('exampleInputPassword1').value;
            if(password.trim() == "" || password.length< 5 ||password == ""){
                passwordError.innerHTML = "password is not Valid";
                document.getElementById("exampleInputPassword1").style.border= "2px solid red"
            }else{
                passwordError.innerHTML = "";
                document.getElementById("exampleInputPassword1").style.border= "2px solid green"
            }

            let passwordconfirmation = document.getElementById('repeatpassword').value;
            if(passwordconfirmation == "" || passwordconfirmation !== password){
                passwordConfError.innerHTML = "passwords do not match";
                document.getElementById("repeatpassword").style.border= "2px solid red"
            }else{
                passwordConfError.innerHTML = "";
                document.getElementById("repeatpassword").style.border= "2px solid green"
            }


        })
        
    });
</script>
@endsection('content')



