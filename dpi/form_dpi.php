<?php
session_start();
if(!$_SESSION["estado"]=="up"){
  header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="ajax.js"></script>
  
    <script type="text/javascript">
        
        function fetch_select(val)
        {
        $.ajax({
        type: 'post',
        url: 'fetch_data.php',
        data: {
        get_option:val
        },
        success: function (response) {
        document.getElementById("estado_civil").innerHTML=response; 
        }
        });
        }
        function fetch_select_lugar(val)
        {
        $.ajax({
        type: 'post',
        url: 'fetch_lugar.php',
        data: {
        get_option:val
        },
        success: function (response) {
        document.getElementById("municipio_nacimiento").innerHTML=response; 
        }
        });
        }
        function fetch_select_vecindad(val)
        {
        $.ajax({
        type: 'post',
        url: 'fetch_lugar.php',
        data: {
        get_option:val
        },
        success: function (response) {
        document.getElementById("municipio_vecindad").innerHTML=response; 
        }
        });
        }
        </script>
  </head>
  <body class="bg-info">
  <header>
    <nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand h1 font-weight-bold">Proyecto Seminario</a>
  
        <a class="nav-link h4" href="../miniproyecto">Mini Proyecto <span class="sr-only">(current)</span></a>
        <a class="nav-link h4" href="form_dpi.php">Formulario DPI <span class="sr-only">(current)</span></a>

    <button class="btn btn-outline-success btn-lg my-2 my-sm-0">
    <a  href="../logout.php">   
       <img src="https://cdn4.iconfinder.com/data/icons/green-shopper/1068/user.png" height="50px" weight="50px" alt="user">

    </a>Logout</button>
</nav>
    </header>
<?php
function php($opt){
  $host = 'localhost';
  $user = 'root';
  $pass = 'melanie';
  mysql_connect($host, $user, $pass);
  mysql_select_db('dpi');

switch($opt){
  case 'sex':{
    $select=mysql_query("select id_sexo, nombre_sexo from sexo group by nombre_sexo");
    while($row=mysql_fetch_array($select))
    {
        echo "<option value='".$row['id_sexo']."'>".$row['nombre_sexo']."</option>";
    }
    break;
  }
  case 'nac':{
    $select=mysql_query("select id_nacionalidad, nombre_nacionalidad from nacionalidad group by nombre_nacionalidad");
    while($row=mysql_fetch_array($select))
    {
        echo "<option value='".$row['id_nacionalidad']."'>".$row['nombre_nacionalidad']."</option>";
    }
    break;
  }
  case 'dep':{
    $select=mysql_query("select id_departamento, nombre from departamento group by nombre");
    while($row=mysql_fetch_array($select))
    {
        echo "<option value='".$row['id_departamento']."'>".$row['nombre']."</option>";
    }
    break;
  }
}

  
}
?>


    <div class="container" style="background:white; margin-top:0px; padding:30px; padding-left:80px; padding-right:80px;">
        <div class="row">
          <a href="busqueda.php">
            <button class="btn btn-success btn-md h4">
             Buscar
             </button></a>
        </div>
        <form method="post" class="" action="dpi.php">
        <div class="row form-group">
          <div class="col-sm-4">
            <label for="cui">CUI: </label>
            <input class="form-control" type="text" name="cui" id="">
          </div>
        </div>
         <div class="row form-group">
            <div class="col">
              <label for="nombre">Nombre:</label>
              <input class="form-control" type="text" name="nombre">
            </div>
            <div class="col">
              <label for="apellido">Apellido:</label>
              <input class="form-control" type="text" name="apellido">  
            </div>
         </div>
         <div class="row form-group">
          <div class="col">
            <label for="sexo">Sexo:</label>
              <select class="form-control" name="sexo" id="" onchange="fetch_select(this.value);">
              <option>Seleccione sexo</option>
                <?php
                 php('sex');
                ?>
              </select>
          </div>
          <div class="col">
            <label for="nacionalidad">Nacionalidad:</label>
              <select class="form-control" name="nacionalidad" id="">
              <?php
                php('nac');
              ?>
              </select>
          </div>
          <div class="col">
            <label for="nacimiento">Fecha Nacimiento:</label>
            <input class="form-control" type="date" name="nacimiento" value="">
          </div>
         </div>
          <div class="row form-group">
          
            <div class="col">
              <label for="departamento">Lugar de nacimiento:</label>
              <select class="form-control" name="departamento" id="" onchange="fetch_select_lugar(this.value);">
              <option>Seleccione departamento</option>
              <?php
                php("dep");
              ?>
              </select>
            </div>
            <div class="col">
              <label class="text-white" for="lugarnacimiento">.</label>
              <select class="form-control" name="lugarnacimiento" id="municipio_nacimiento">
               
              </select>           
            </div>
            <div class="col">
              <label for="estado_civil">Estado Civil:</label>
              <select class="form-control" name="estado_civil" id="estado_civil">
               
              </select>
            </div>
          </div>
          <div class="row form-group">
            
            <div class="col">
              <label for="departamento">Vecindad:</label>
              <select class="form-control" name="departamento" id="" onchange="fetch_select_vecindad(this.value);">
              <option>Seleccione departamento</option>
              <?php
                php("dep");
              ?>
              </select>

              </div>
            <div class="col">
              <label class="text-white" for="vecindad">.</label>
              <select class="form-control" name="vecindad" id="municipio_vecindad">
               
              </select>           
            </div>
            <div class="col">
              <label for="vencimiento">Fecha de Vencimiento:</label>
              <input class="form-control" type="date" name="vencimiento" value="28/01/2024">
            </div>
          </div>         
          
            
          
          <div class="row">
          <div class="col"></div>
          <div class="col">
          <button class="btn btn-primary btn-lg h3 btn-block " type="submit" name="enviar">ENVIAR</button>
          </div>

          </div>
          
      </form>

      <a href="vistas/nacionalidad.php">
      <button class="btn btn-dark btn-md h4">
        Nacionalidad
      </button></a>
      <a href="vistas/estado_civil.php">
      <button class="btn btn-dark btn-md h4">
        Estado civil
      </button></a>
      <a href="vistas/sexo.php">
      <button class="btn btn-dark btn-md h4">
        Sexo
      </button></a>
      <a href="vistas/documentos.php">
      <button class="btn btn-dark btn-md h4">
        Documentos
      </button></a>
      
    </div>
  
  </body>
</html>

