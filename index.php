<?php
session_start();

    include('conexion.php');
    include('encript.php');
	
	$error="";
    if(isset($_POST['enviar']))
    {
    //$usuario=encript::encrypt($_POST['usuario'],$_POST['usuario']);
    //$password=encript::encrypt($_POST['password'],$_POST['password']);
    //$pru=login($usuario,$password);
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];
    $ret=mysqli_query($con,"select * from usuarios where username='".$usuario."' and password='".$password."'" );
    $num=mysqli_fetch_array($ret);
    if ($num > 0) {
    $_SESSION["estado"] = "up";

    
    $extra="menu.php";
    $host=$_SERVER['HTTP_HOST'];
    $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    header("location:http://$host$uri/$extra");
    //header('Location:http://localhost/dpi/dpi.php');
    }else{
        $error="usuario o contraseña invalida";}
    
    
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" witdh="10" height="10">

</head>
<body>


<form  method="POST">
  

  <div class="container" style="padding-left:300px; padding-right:300px;">
  
    <div class="row justify-content-center" style="padding-top:50px;">
        <div class="imgcontainer">
        <img src="https://cdn0.iconfinder.com/data/icons/user-icons-4/100/user-28-512.png" alt="Avatar" class="avatar" height="250px" weight="250px">
        </div>
    </div>
    <div class="row form-group">
        <label for="uname"><b>Username</b></label>
        <input class="form-control" type="text" placeholder="Enter Username" name="usuario" required>
    </div>
    <div class="row form-group">
        <label for="psw"><b>Password</b></label>
        <input class="form-control" type="password" placeholder="Enter Password" name="password" required>
    </div>
    <div class="row justify-content-center">
    <button class="btn btn-success btn-lg btn-block" style="weight:50px;" type="submit" name="enviar" value="enviar">Login</button>


    </div>
   

    
        
    <label class="text-danger"> 
     <?php echo $error;?>
    </label>
  </div>
</form>

</body>
    
</body>
</html>