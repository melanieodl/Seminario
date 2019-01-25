<?php
include('encrip.php');
include('config.php');
?>
<?php
if(isset($_POST['enviar']))
{
$usuario=encry::encrypt($_POST['usuario'],$_POST['usuario']);
$password=encry::encrypt($_POST['password'],$_POST['password']);
//$pru=login($usuario,$password);
$ret=mysqli_query($con,"select * from usuarios where nombre_usuario='".$usuario."' and password='".$password."'" );
$num=mysqli_fetch_array($ret);
if ($num > 0) {
$extra="dpi.php";
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
//header('Location:http://localhost/dpi/dpi.php');
}
?>

<?php
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/4.1/examples/sign-in/signin.css" rel="stylesheet">

  </head>
  <body class="text-center">
    <form class="form-signin" method="post">
          <img class="mb-4" src="http://34.208.64.231/vencidos/images/avatar.png" alt="" width="72" height="72">
          <h1 class="h3 mb-3 font-weight-normal">Iniciar sesion</h1>
          <label for="usuario" class="sr-only">Usuario</label>
          <input type="text" name="usuario" class="form-control" placeholder="Usuario" required="" autofocus="">
          <label for="password" class="sr-only">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Password" required="">

          <button class="btn btn-lg btn-primary btn-block" type="submit" name="enviar">Iniciar</button>
          <p class="mt-5 mb-3 text-muted">© Angel Torre</p>
        </form>

  </body>
</html>
