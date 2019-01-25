<?php
if(isset($_POST['get_option']))
{
 $host = 'localhost';
 $user = 'root';
 $pass = 'melanie';
 mysql_connect($host, $user, $pass);
 mysql_select_db('dpi');

 $state = $_POST['get_option'];
 $find=mysql_query("select nombre_estado,id_estado_civil from estado_civil where id_sexo='$state'");
 while($row=mysql_fetch_array($find))
 {
  echo "<option value='".$row['id_estado_civil']."'>".$row['nombre_estado']."</option>";
  
 }
 exit;
}
?>