<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>

  <img class="decorationimg" src="{{asset('images/ellipsedeco.png')}}" alt="">


  <section class="content container-fluid d-flex">      
  <nav class="navbar navbar-expand-lg w-100">
      <div class="container-fluid ">
        <a class="navbar-brand w-25 text-light fw-bold fs-1" href="#">F<span style="color:rgba(115, 45, 158, 1)">Y</span>R</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
      </div>
      <div class="collapse navbar-collapse  me-5 " style="width:500%" id="navbarNavAltMarkup">
          <div class="navbar-nav d-flex justify-content-around ms-5" style="width:400%">
              <a class="nav-link active text-light fw-bold" aria-current="page" href="#">Home</a>
              <a class="nav-link text-light fw-bold" href="#">Find a place</a>
              <a class="nav-link text-light fw-bold" href="#">Find a roommate</a>
              <a class="nav-link text-light fw-bold" aria-disabled="true">How it works</a>
          </div>
      </div>
</nav>
</section>

    @yield('content')
    @extends('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>

<style>
  body{
    /* background-color:rgba(0, 0, 0, 1); */
    background-color:rgba(0, 0,0, 1)!important;
    position: relative;
    overflow-x:hidden !important;
  }
  .decorationimg{
        position: absolute;
        margin-left:36.4%;
        margin-top:-5%;
        z-index: -1;
        /* padding:0px */
    }
 

  .content{
    position: relative;
    z-index: 1;
  }
  @media (max-width:600px){

  .decorationimg{
      display:none;
  }
  }



</style>