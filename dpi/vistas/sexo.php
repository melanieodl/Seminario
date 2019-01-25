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

echo "<div class='container' style='padding-top:50px;'>";
echo "<table class='table' style='border: solid 1px black;'>";
echo "<tr class='thead-dark text-center'><th>ID</th><th>Sexo</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
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
    
    $stmt = $conn->prepare("SELECT id_sexo, nombre_sexo FROM sexo"); 
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