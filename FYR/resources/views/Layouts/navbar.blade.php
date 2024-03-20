<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <section class="container-fluid d-flex">

  <!-- <div class="square1">
    
  </div> -->
      
  <nav class="navbar navbar-expand-lg w-100">
      <div class="container-fluid ">
        <a class="navbar-brand w-25 text-light" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
      </div>
      <div class="collapse navbar-collapse  me-5 " style="width:500%" id="navbarNavAltMarkup">
          <div class="navbar-nav d-flex justify-content-around ms-5" style="width:400%">
              <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
              <a class="nav-link text-light" href="#">Features</a>
              <a class="nav-link text-light" href="#">Pricing</a>
              <a class="nav-link text-light" aria-disabled="true">Disabled</a>
          </div>
      </div>
</nav>






      </section>

    @yield('content')  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<style>
  body{
    background-color:rgba(0, 0, 0, 1);
  }


</style>