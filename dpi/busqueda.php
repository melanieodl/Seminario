<?php
session_start();
if(!$_SESSION["estado"]=="up"){
  header('location: ../index.php');
}
include('conexion.php');
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      
    <script>
   var nombre=val;
    }
</script>


</head>
<body>
<?php

?>
 <div class="container">
 <form action="busqueda.php" method="POST">
 
    <div class="row form-group">
        <label for="nombre"><b>Nombre</b></label>
        <input class="form-control" type="text" id="nombre" placeholder="Ingrese nombre" name="nombre">
    </div>
    <div class="row form-group">
        <label for="apellido"><b>Apellidos</b></label>
        <input class="form-control" type="text" placeholder="Ingrese apellido" name="apellido">
    </div>
    <div class="row form-group">
        <label for="region"><b>Region</b></label>
        <input class="form-control" type="text" placeholder="Ingrese region" name="region">
    </div>
    <div class="row form-group">
        <label for="region"><b>Sexo</b></label>
        <select class="form-control" name="sexo" id="sexo">
        <option value="">Seleccione sexo</option>
        <?php sexo(); ?>
        </select>
    </div>
    <div class="row form-group">
        <label for="edad"><b>Edad</b></label>
        <input class=" col form-control" type="number" name="min">
        <?php echo "  ".y."  "?>
        <input class="col form-control" type="number" name="max">
    </div>
    <button class="btn btn-primary" type="submit" name="enviar" value="enviar">Buscar</button>
    </form>

</div>
<?php
function sexo(){
 $host = 'localhost';
 $user = 'root';
 $pass = 'melanie';
 mysql_connect($host, $user, $pass);
 mysql_select_db('dpi');

 $select=mysql_query("select nombre_sexo from sexo group by nombre_sexo");
 while($row=mysql_fetch_array($select))
 {
     echo "<option value='".$row['nombre_sexo']."'>".$row['nombre_sexo']."</option>";
 }
}

?>

<?php

echo "<div class='container-fluid' style='padding-top:50px;'>";
echo "<table class='table table-sm table-striped table-bordered'>";
echo "<tr class='thead-dark small-text text-center'><th>CUI</th><th>Nombre</th><th>Apellidos</th><th>Sexo</th><th>Nacionalidad</th><th>Fecha de Nacimiento</th><th>Vecindad</th><th>Estado Civil</th><th>Fecha Vencimiento</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black; font-size:13px;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 

} 
echo "</div>";


if(!empty($_POST['enviar'])){
    if(!empty($_POST['nombre'])){
        $nombre =$_POST['nombre'];
    }
    if(!empty($_POST['apellido'])){
        $apellido =$_POST['apellido'];
    }
    if(!empty($_POST['region'])){
        $region=$_POST['region'];
    }
    if(!empty($_POST['min'])||!empty($_POST['max'])){
     /*   $fecha_actual = date("Y-m-d");
            $conn=conexion::connect();
            $stml=$conn->prepare('SELECT fecha_nacimiento FROM documento');
            $stml->execute();
            $result = $stml->fetchColumn(0);
            echo $result;
            $conn=null;*/
       if($_POST['min']>$_POST['max']){
        $min=$_POST['max'];
        $max=$_POST['min'];
       }else{
        $min=$_POST['min'];
        $max=$_POST['max'];
       }
       
               
    }
    if(!empty($_POST['sexo'])){
        $sexo=$_POST['sexo'];
    }
    
    
    
}


try {
    $conn=conexion::connect();
    
    $stmt = $conn->prepare("SELECT t1.CUI,t1.nombre,t1.apellidos,t2.nombre_sexo,t3.nombre_nacionalidad,t1.fecha_nacimiento,
    t4.nombre_muni,t5.nombre_estado,t1.fecha_vencimiento
    FROM documento t1
    INNER JOIN sexo t2 ON t2.id_sexo = t1.sexo
    INNER JOIN nacionalidad t3 ON t3.id_nacionalidad = t1.nacionalidad
    INNER JOIN municipio t4 ON t4.id_municipio = t1.vecindad
    INNER JOIN estado_civil t5 ON t5.id_estado_civil = t1.estado_civil
    where t1.nombre like '%$nombre%' AND t1.apellidos like '%$apellido%' AND t4.nombre_muni like '%$region%'
    AND t2.nombre_sexo like '%$sexo%' ;
    "); 


    
    


    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";

?> 
            <a href="form_dpi.php" class="btn btn-primary btn-lg h3">ATRAS</a>

</body>
</html>