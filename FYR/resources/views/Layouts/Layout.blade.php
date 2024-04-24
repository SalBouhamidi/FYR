<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>


  <img class="decorationimg" src="{{asset('images/ellipsedeco.png')}}" alt="">

    @yield('content')
    
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('layouts.footer')

</body>
</html>

<style>
  body{
    background-color: rgba(0, 0,0, 1);
    position: relative;
    overflow-x:hidden !important;
  }
  .decorationimg{
        position: absolute;
        margin-left:36.4%;
        margin-top:-6%;
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