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
    

  </head>
  <body background="http://www.cubemaniacs.com/wp-content/uploads/2014/12/dreamstime_l_34259408.jpg">
  <header>
    <nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand h1 font-weight-bold">Proyecto Seminario</a>
  
        <a class="nav-link h4" href="index.php">Mini Proyecto <span class="sr-only">(current)</span></a>
        <a class="nav-link h4" href="../dpi/form_dpi.php">Formulario DPI <span class="sr-only">(current)</span></a>

    <button class="btn btn-outline-success btn-lg my-2 my-sm-0">
    <a  href="../logout.php">   
       <img src="https://cdn4.iconfinder.com/data/icons/green-shopper/1068/user.png" height="50px" weight="50px" alt="user">

    </a>Logout</button>
</nav>
    </header>
    <div class="container" style="background:white;">
    <div class="row" style="padding:30px; margin-top:0px; margin-left:-15px;">
    <div class="col">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-cilindro-tab" data-toggle="tab" href="#nav-cilindro" role="tab" aria-controls="nav-cilindro" aria-selected="true">Area de un cilindro</a>
          <a class="nav-item nav-link" id="nav-factorial-tab" data-toggle="tab" href="#nav-factorial" role="tab" aria-controls="nav-factorial" aria-selected="false">Calcular factorial</a>
          <a class="nav-item nav-link" id="nav-par-impar-tab" data-toggle="tab" href="#nav-par-impar" role="tab" aria-controls="nav-par-impar" aria-selected="false">Paridad</a>

          <a class="nav-item nav-link" id="nav-encriptar-tab" data-toggle="tab" href="#nav-encriptar" role="tab" aria-controls="nav-encriptar" aria-selected="false">Encriptar</a>
          <a class="nav-item nav-link" id="nav-desencriptar-tab" data-toggle="tab" href="#nav-desencriptar" role="tab" aria-controls="nav-desencriptar" aria-selected="false">Desencriptar</a>
          <a class="nav-item nav-link" id="nav-hash-tab" data-toggle="tab" href="#nav-hash" role="tab" aria-controls="nav-hash" aria-selected="false">Hash</a>


        </div>
      </nav>

    </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-cilindro" role="tabpanel" aria-labelledby="nav-cilindro-tab">
                    <form method="post" style="padding:50px;"class="" action="cilindro_result.php">
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"for="altura">Altura:</label>
                            <div class="col-sm-5">
                                <input class="form-control" type="number" name="altura" value="">
                            </div>
                            <label class="col-sm-1 col-form-label" for="diametro">Diametro:</label>
                            <div class="col-sm-5">
                                <input class="form-control"type="number" name="diametro" value="">  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col self-align-end"></div>
                                <button class="btn btn-primary btn-md h2 "type="submit" name="enviar">ENVIAR</button>   
                            
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-factorial" role="tabpanel" aria-labelledby="nav-factorial-tab">
                <form method="post" style="padding:50px;" class="" action="factorial.php">
                    <div class="row form-group justify-content-md-center">
                        <label class="col-sm-1 col-form-label" for="numero">Numero:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="number" name="numero" value="">
                        </div>
                    </div>
                    <div class="row">
                    <div class="col self-align-end"></div>
                        <button class="btn btn-primary btn-md h2 "type="submit" name="sub_numero">ENVIAR</button>
                    </div>
                </form>
                </div>
                <div class="tab-pane fade" id="nav-par-impar" role="tabpanel" aria-labelledby="nav-par-impar-tab">
                <form method="post" style="padding:50px;" class="" action="impar_par.php">
                    <div class="row form-group justify-content-md-center">
                        <label class="col-sm-1 col-form-label" for="numero">Numero:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="number" name="numero" value="">
                        </div>
                    </div>
                    <div class="row">
                    <div class="col self-align-end"></div>
                        <button class="btn btn-primary btn-md h2 "type="submit" name="parimpar">ENVIAR</button>
                    </div>
                </form>
                </div>
                <div class="tab-pane fade" id="nav-encriptar" role="tabpanel" aria-labelledby="nav-encriptar-tab">
                    <form method="post" style="padding:50px;" action="result_encript.php">
                        <div class="row form-group">
                            <label class="col-sm-1 col-form-label" for="texto">Texto:</label>
                            <div class="col-sm-5">  
                                <input class="form-control" type="text" name="texto" value="">
                            </div>
                            <label class="col-sm-1 col-form-label" for="llave">Llave:</label>
                            <div class ="col-sm-5">
                                <input class="form-control" type="text" name="llave" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col self-align-center"></div>
                            <button class="btn btn-primary btn-md h2 " type="submit" name="encrypt">ENCRYPT</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-desencriptar" role="tabpanel" aria-labelledby="nav-desencriptar-tab">
                    <form method="post" style="padding:50px;" class="" action="result_encript.php">
                        <div class="row form-group">
                            <label class="col-sm-2 col-form-label "for="texto">Texto Encriptado:</label>
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="texto" value="">
                            </div
                            <label class="col-sm-1 col-form-label" for="llave">Llave:</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="llave" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col self-align-center"></div>
                            <button class="btn btn-primary btn-md h2 " type="submit" name="decrypt">DECRYPT</button>
                        </div>  
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-hash" role="tabpanel" aria-labelledby="nav-hash-tab">
                <form method="post" style="padding:50px;"class="" action="hash.php">
                    <div class="row form-group justify-content-md-center">
                        <label class="col-sm-1 col-form-model"for="password">Password:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="password" value="">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col self-align-center"></div>
                        <button class="btn btn-primary btn-md h2 " type="submit" name="hash">HASH</button>
                    </div> 
                </form>
                </div>
            </div>
        </div>
    </div>
    </div>
  </body>
  

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
   
</html>