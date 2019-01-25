<?php
//Pactica Seminario I
//Angel Leonel Torre Lopez carne: 1190-14-6712
//Melanie Vanessa Orellana de Leon carne: 1190-14-16483 

echo "hola mundo";
for($i=1;$i<=10;$i++){

  echo "</br>".$i;
}
$a=5;
$b=8;
echo "</br>";
if($a>$b){
  echo $a." es mayor a".$b;
}else if($b>$a){
  echo $b." es mayor a ".$a;

}
else{
  echo $a." y ".$b." son iguales";
}

echo "<table border=1>"
;


  for($i=1;$i<=10;$i++){
    echo "<tr><td>";
  echo $i;
    echo "</td></tr>";
  }

echo  "
  </table>";




  echo "<table border=1>";

    for($i=1;$i<=10;$i++){
      echo "<tr><td>";
    echo 1*$i;
      echo "</td>";

      echo "<td>";
    echo 2*$i;
      echo "</td>";

      echo "<td>";
    echo 3*$i;
      echo "</td>";

      echo "<td>";
    echo 4*$i;
      echo "</td></tr>";
    }
    

  echo  "</table>";


/*
function encrypt($string,$key){
  $result="";
  for ($i=0; $i <strlen($string) ; $i++) {
    # code...
    $char=substr($string,$i,1);
    $keychar=substr($key,($i %strlen($key))-1,1);
    $char=chr(ord($char)+ord($keychar));
    $result=$char;
  }
  return base64_encode($result);
}

function decrypt($string,$key){
  $result="";
  $string=base64_decode($string);
  for ($i=0; $i <strlen($string) ; $i++) {
    # code...
    $char=substr($string,$i,1);
    $keychar=substr($key,($i %strlen($key))-1,1);
    $char=chr(ord($char)-ord($keychar));
    $result=$char;
  }
  return $result;
}

echo "<p>".encrypt("esta es una oracion","esto")."</p>";
echo "<p>".decrypt("4Q==","esto")."</p>";
*/
//funsion para encriptar textos, se envia el texto mas una llave la que se
//utiliza posteriormente para desencriptar el texto
function encrypt($string, $key)
{
 $result = '';
 for($i=0; $i<strlen($string); $i++)
{
 $char = substr($string, $i, 1);
 $keychar = substr($key, ($i % strlen($key))-1, 1);
 $char = chr(ord($char)+ord($keychar));
 $result.=$char;
 }
 return base64_encode($result);
}
//funsion para desencriptar el texto de la primera funsion
//recibe el texto previamente encriptaro y la misma llave
function decrypt($string, $key)
{
 $result = '';
 $string = base64_decode($string);
 for($i=0; $i<strlen($string); $i++)
{
 $char = substr($string, $i, 1);
 $keychar = substr($key, ($i % strlen($key))-1, 1);
 $char = chr(ord($char)-ord($keychar));
 $result.=$char;
 }
return $result;
}
//ejemplo
//la variable texto contiene el texto a encriptar
//la variable llave contiene la llave
$texto="JUAN POSADAS";
$llave="UMG";
//se envian la varibale texto y llave para ser encriptados
$textoencriptado = encrypt($texto,$llave);
echo $textoencriptado;
echo "<br>";
//se envia la variable textoencriptado y la llame para ser desencriptado
echo decrypt($textoencriptado,$llave);


$password=password_hash('umg',PASSWORD_DEFAULT);
$original="umg";
$iguales=password_verify($original,$password);

if ($iguales) {
  echo "Puedes pasar a la zona privada";
}else {
  echo "La clave indicada no es correcta";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <form method="post" class="" action="holamundo.php">
          <label for="user">Usuario:</label>
          <input type="text" name="user" value="">
          <label for="pass">Contraseña</label>
          <input type="password" name="pass" value="">
          <button type="submit" name="enviar">ENVIAR</button>
      </form>
      <form method="post" class="" action="resultado.php">
          <label for="user">Usuario:</label>
          <input type="text" name="user" value="">
          <label for="pass">Contraseña</label>
          <input type="password" name="pass" value="">
          <button type="submit" name="siguiente">ENVIAR</button>
      </form>
      <?php
      if(isset($_POST['enviar']))
      {
      $usuario=$_POST['user'];
      $password=$_POST['pass'];
      $pass=password_hash($password,PASSWORD_DEFAULT);

      echo $usuario;
      echo "</br>";
      echo $pass;

      }
      ?>
     
  </body>
</html>
