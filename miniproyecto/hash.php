<?php
    include('encript.php');
    $password;
   if(isset($_POST['hash']))
   {
    
   }

   $password=encript::hash($_POST['password']);

   /*$password=password_hash('umg',PASSWORD_DEFAULT);
   $original="umg";
   $iguales=password_verify($original,$password);
   
   if ($iguales) {
     echo "Puedes pasar a la zona privada";
   }else {
     echo "La clave indicada no es correcta";
   }*/
   ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

  </head>
  <body background="http://www.cubemaniacs.com/wp-content/uploads/2014/12/dreamstime_l_34259408.jpg">
      <div class="container" style="background:white; margin-top:80px; height:310px; padding:30px;">
      <div class="row" style="padding-right:30px; padding-left:30px;">
      
      <a href="index.php" class="btn btn-primary btn-md h3">ATRAS</a>
      </div>
      <div  style="height:210px;"class="row align-items-center justify-content-center">
        <div class="col">
          <p class="text-center font-weight-bold text-danger bold h3"><?php echo $password;?></p>
        </div>
      </div>
      </div>
  </body>
  </html>   