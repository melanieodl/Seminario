<?php
session_start();
if(!$_SESSION["estado"]=="up"){
  header('location: ../../index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>

<?php
include('conexion.php');

echo "<div class='container-fluid' style='padding-top:50px;'>";
echo "<table class='table table-sm' style='border: solid 1px black;'>";
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

try {
    $conn=conexion::connect();
    
    $stmt = $conn->prepare("SELECT t1.CUI,t1.nombre,t1.apellidos,t2.nombre_sexo,t3.nombre_nacionalidad,t1.fecha_nacimiento,
    t4.nombre_muni,t5.nombre_estado,t1.fecha_vencimiento
    FROM documento t1
    INNER JOIN sexo t2 ON t2.id_sexo = t1.sexo
    INNER JOIN nacionalidad t3 ON t3.id_nacionalidad = t1.nacionalidad
    INNER JOIN municipio t4 ON t4.id_municipio = t1.vecindad
    INNER JOIN estado_civil t5 ON t5.id_estado_civil = t1.estado_civil"); 


    
    


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
 <a href="../form_dpi.php" class="btn btn-primary btn-lg h3">ATRAS</a>
</body>
</html>