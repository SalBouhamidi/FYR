@extends('layouts.layout')
@section('content')
<section class="register mx-5">

<a class="navbar-brand w-25 text-light fw-bold fs-1 mb-5" href="#">F<span style="color:rgba(115, 45, 158, 1)">Y</span>R</a>
<div class="d-flex justify-content-end">
<a href="{{route('register')}}" class="btn  px-5 registerbtn mb-5">Register </a>
</div>
        <div class="signupform mx-5 h-75 mb-3 ">
        
            <div class="my-2 mx-5 mt-5 ">
            <form class="form p-3" id="form"  method="post" action="{{route('login')}}">
                    @csrf
                <div class="mb-3 ">
                    <label for="exampleInputEmail1" class="form-label fs-5">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"  placeholder="Example azerty@gmail.com..." aria-describedby="emailHelp">
                    <span class="text-danger" id="emailError"></span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label fs-5">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Example AZerT55...">
                    <span class="text-danger" id="passwordError"></span>

                </div>
                
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-submit text-light fw-semibold px-4">Sign in</button>
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
        let errorEmail =  document.getElementById('emailError')
        let errorPassword =  document.getElementById('passwordError')

        var regexEmail= /^\S+@\S+\.\S+$/;


        form.addEventListener('input',(e) =>
        {
            let email = document.getElementById('exampleInputEmail1').value;
            if(email.trim() === "" || !email.match(regexEmail) || email == ""){
                errorEmail.innerHTML = "Email is not Valid";
                document.getElementById("exampleInputEmail1").style.border= "2px solid red"

            }else{
                errorEmail.innerHTML = "";
                document.getElementById("exampleInputEmail1").style.border= "2px solid green"
            }

            let password = document.getElementById('exampleInputPassword1').value;
            if(password.trim() == "" || password.length< 5 ||password == ""){
                errorPassword.innerHTML = "password is not Valid";
                document.getElementById("exampleInputPassword1").style.border= "2px solid red"
            }else{
                errorPassword.innerHTML = "";
                document.getElementById("exampleInputPassword1").style.border= "2px solid green"
            }
            
        })
        
    });

    // }

</script>
@endsection('content')



