
<?php
      if(isset($_POST['enviar']))
      {
      $altura=$_POST['altura'];
      $diametro=$_POST['diametro'];
      $radio=pow($diametro,2);

     $Resultado=2*pi()*($diametro/2)*$altura;
     

      //echo pi*($diametro/2,2).pow*$altura;

     
      //print_r($_POST);
//$uno=$_POST["x"];

      }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    

  </head>
  <body background="http://www.cubemaniacs.com/wp-content/uploads/2014/12/dreamstime_l_34259408.jpg">
      <div class="container" style="background:white; margin-top:80px; height:310px; padding:30px;">
      <div class="row" style="padding-right:30px; padding-left:30px;">
      
      <a href="index.php" class="btn btn-primary btn-md h3">ATRAS</a>
      </div>
      <div  style="height:210px;"class="row align-items-center justify-content-center">
        <div class="col">
          <p class="text-center font-weight-bold text-danger bold h3"><?php echo $Resultado." metros cuadrados";?></p>
        </div>
      </div>
      </div>
  </body>
  

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
   
</html>