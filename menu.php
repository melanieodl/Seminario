<?php
session_start();
if(!$_SESSION["estado"]=="up"){
  header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en"> <!--
                 lenguaje primario de la pagina, recomendacion de w3c que se encuentre en tag html, 
                 destinado a asistir a losmotores de busqueda y navegadores
                 english=en
                 spanish=es-->

    <head>
    <!--Required meta tags for Bootstrap-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="IE_edge">
    <meta name="description" content="">
    

   <!--Bootstrap CSS-->
   <link rel="stylesheet" href=">/css/estilos.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" witdh="10" height="10">
    <!-- Custom styles for this template -->
    <title>Seminario</title>
   
    </head>

    <body> 
    <header>
    
    <nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand h1 font-weight-bold">Proyecto Seminario</a>
  
        <a class="nav-link h4" href="miniproyecto">Mini Proyecto <span class="sr-only">(current)</span></a>
        <a class="nav-link h4" href="dpi/form_dpi.php">Formulario DPI <span class="sr-only">(current)</span></a>
        <a><?php?></a>

    <button class="btn btn-outline-success btn-lg my-2 my-sm-0">
    <a  href="logout.php">   
       <img src="https://cdn4.iconfinder.com/data/icons/green-shopper/1068/user.png" height="50px" weight="50px" alt="user">

    </a>Logout</button>
</nav>
    </header>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://designersinstitute.nz/assets/resized/sm/upload/sm/s1/7n/kr/245_DINZ_Event-Banners-FA_Designers-Speak-0-551-0-0.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
         <h5>...</h5>
        <p>...</p>
        </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://designersinstitute.nz/assets/resized/sm/upload/g8/6k/wk/7b/Designers%20Speak%20-%20Secondary%20Seminar%202017%20-%20Jasmax-0-551-0-0.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>...</h5>
        <p>...</p>
     </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://designersinstitute.nz/assets/resized/sm/upload/ej/19/ip/e0/DINZSC%202017%20-%20Secondary%20School%20Seminar%20-151-0-602-0-0.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>...</h5>
        <p>...</p>
        </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


    
    <footer class="container-fluid" style="background-color: #BEBEBE;">
        
    
    </footer>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    
</body>

</html>