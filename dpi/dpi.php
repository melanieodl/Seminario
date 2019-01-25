<?php
session_start();
if(!$_SESSION["estado"]=="up"){
  header('location: ../index.php');
}

include('encript.php');
include('conexion.php');
//ejemplo
//la variable texto contiene el texto a encriptar
//la variable llave contiene la llave
if(isset($_POST['enviar']))
{
$Error="";
//segundo_apellido=test_input($_POST["apellido_madre"]);

$cui=encript::encrypt($_POST['cui'],$_POST['cui']);
$nombre=$_POST['nombre']; 
$apellido=$_POST['apellido'];
$sexo=$_POST['sexo'];
$nacionalidad=$_POST['nacionalidad'];
$nacimiento=$_POST['nacimiento'];
$lugar_nacimiento=$_POST['lugarnacimiento'];
$vecindad=$_POST['vecindad'];  
$estado_civil=$_POST['estado_civil'];
$vencimiento=$_POST['vencimiento']; 
if(!empty($cui)&&!empty($sexo)&&!empty($lugar_nacimiento)&&!empty($vecindad)&&!empty($estado_civil)&&!empty($nacionalidad)){
    try {
        $conn=conexion::connect();
        $stml=$conn->prepare('INSERT INTO documento(CUI,nombre,apellidos,sexo,nacionalidad,fecha_nacimiento,lugar_nacimiento,vecindad,estado_civil,fecha_vencimiento)
        VALUES (?,?,?,?,?,?,?,?,?,?)');
        $stml->execute(array("$cui","$nombre","$apellido",$sexo,$nacionalidad,"$nacimiento",$lugar_nacimiento,$vecindad,
    $estado_civil,"$vencimiento"));
      
    } catch (Exception $e) 
    {
        echo $sql . "<br>" . $e->getMessage();
        echo "ESTADO CIVIL ".$estado_civil;
    }
    
    $conn = null;
    
}else{ 
   $Error=" * Falta llenar datos requeridos";
}



} 

 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <style>
    .th {
        font-size:14px;
        text-align: right;
        
    

    }
    .cont{
        background:white; margin-top:0px; padding:30px; padding-left:80px; padding-right:80px;
        height:550px;
    }

    </style>

</head>
<body class="bg-info">
<header>
    <nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand h1 font-weight-bold">Proyecto Seminario</a>
  
        <a class="nav-link h4" href="../miniproyecto">Mini Proyecto <span class="sr-only">(current)</span></a>
        <a class="nav-link h4" href="form_dpi.php">Formulario DPI <span class="sr-only">(current)</span></a>

    <button class="btn btn-outline-success btn-lg my-2 my-sm-0">
    <a  href="../index.php">   
       <img src="https://cdn4.iconfinder.com/data/icons/green-shopper/1068/user.png" height="50px" weight="50px" alt="user">

    </a>Logout</button>
</nav>
    </header>
    <div class="container cont bg-white">
    <div class="row"><?php echo $Error?></div>
        <table class="table table-bordered">
            <tr>
                <td width="5%" class="th"scope="col">CUI:</td>
                <td class="text-left font-weight-bold" scope="col" class="text-left"><?php echo $cui;?></td>
            </tr>
        </table>
        <table class="table table-bordered ">
            <tr>
                <td width="8%" class="th"scope="row">NOMBRE:</td>
                <td class="text-uppercase font-weight-bold"><?php echo $nombre;?></td>
                <td width="8%"class="th">APELLIDO:</td>
                <td class="text-uppercase font-weight-bold"><?php echo $apellido;?></td> 
            </tr>
        </table>
        <table class="table table-bordered">
            <tr>
                <td width="6%"class="th" scope="row">SEXO:</td>
                <td class="text-uppercase font-weight-bold"><?php
                $conn=conexion::connect();
                $stmt = $conn->prepare("SELECT nombre_sexo FROM sexo WHERE id_sexo=$sexo");
                $stmt->execute();
                // set the resulting array to associative
                $result = $stmt->fetchColumn(0);
                echo $result;
                $conn=null;
                ?></td>
                <td width="10%" class="th">NACIONALIDAD:</td>
                <td class="text-uppercase font-weight-bold"><?php 
                 $conn=conexion::connect();
                 $stmt = $conn->prepare("SELECT nombre_nacionalidad FROM nacionalidad WHERE id_nacionalidad=$nacionalidad");
                 $stmt->execute();
                 // set the resulting array to associative
                 $result = $stmt->fetchColumn(0);
                 echo $result;
                 $conn=null;
                ?></td> 
                <td width="21%"class="th">FECHA DE NACIMIENTO:</td>
                <td class="text-uppercase font-weight-bold"><?php echo $nacimiento;?></td> 
            </tr>
        </table>
        <table class="table table-bordered">
            <tr>
                <td width="20%"class="th" scope="row">LUGAR DE NACIMIENTO:</td>
                <td class="text-uppercase font-weight-bold"><?php 
                 $conn=conexion::connect();
                 $stmt = $conn->prepare("SELECT nombre_muni FROM municipio WHERE id_municipio=$lugar_nacimiento");
                 $stmt->execute();
                 // set the resulting array to associative
                 $municipio = $stmt->fetchColumn(0);
                 $stmp = $conn->prepare("SELECT departamento FROM municipio WHERE id_municipio=$lugar_nacimiento");
                 $stmp->execute();
                 $id_dep=$stmp->fetchColumn(0);
                 $stms = $conn->prepare("SELECT nombre FROM departamento WHERE id_departamento=$id_dep");
                 $stms->execute();
                 $departamento=$stms->fetchColumn(0);
                 
                 echo $municipio." , ".$departamento;
                 $conn=null;
                ?></td>
                <td width="10%"class="th">VECINDAD:</td>
                <td class="text-uppercase font-weight-bold"><?php 
                $conn=conexion::connect();
                $stmt = $conn->prepare("SELECT nombre_muni FROM municipio WHERE id_municipio=$vecindad");
                $stmt->execute();
                // set the resulting array to associative
                $municipio = $stmt->fetchColumn(0);
                $stmp = $conn->prepare("SELECT departamento FROM municipio WHERE id_municipio=$vecindad");
                $stmp->execute();
                $id_dep=$stmp->fetchColumn(0);
                $stms = $conn->prepare("SELECT nombre FROM departamento WHERE id_departamento=$id_dep");
                $stms->execute();
                $departamento=$stms->fetchColumn(0);
                
                echo $municipio." , ".$departamento;
                $conn=null;?></td> 
            </tr>
        </table>
        <table class="table table-bordered">
            <tr>
                <td width="20%" class="th" scope="row">ESTADO CIVIL:</td>
                <td class="text-uppercase font-weight-bold"><?php
                 $conn=conexion::connect();
                 $stmt = $conn->prepare("SELECT nombre_estado FROM estado_civil WHERE id_estado_civil=$estado_civil");
                 $stmt->execute();
                 // set the resulting array to associative
                 $result = $stmt->fetchColumn(0);
                 echo $result;
                 $conn=null;
                ?></td>
                <td width="21%" class="th">FECHA DE VENCIMIENTO:</td>
                <td class="text-uppercase font-weight-bold"><?php echo $vencimiento;?></td> 
            </tr>
        </table>
        <br><br>
        <div class="row">
        <div class="col align-self-end"></div>
            <a href="form_dpi.php" class="btn btn-primary btn-lg h3">ATRAS</a>
        </div>
    </div>
        
</body>
</html>