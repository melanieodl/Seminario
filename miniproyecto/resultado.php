<?php
if(isset($_POST['siguiente']))
{
$usuario=$_POST['user'];
$password=$_POST['pass'];
$pass=password_hash($password,PASSWORD_DEFAULT);

echo $usuario;
echo "</br>";
echo $pass;

}
?>
?>