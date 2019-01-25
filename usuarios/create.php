<?php
 include('../encript.php');
 include('conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
<?php
     

 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nombreError = null;
        $passwordError = null;
        $dpiError = null;        
        $emailError = null;
        $roleError = null;
        
        // keep track post values
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $dpi = $_POST['dpi'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        
        
         
        // validate input
        $valid = true;
        if (empty($nombre)) {
            $nombreError = 'ingrese nombre';
            $valid = false;
        }
         
        if (!empty($email)) {
            if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
                $emailError = 'ingrese email valido';
                $valid = false;
            }
             
        } 
        if (empty($dpi)) {
            $dpiError = 'ingrese dpi';
            $valid = false;
        }
        if (empty($password)) {
            $passwordError = 'ingrese password';
            $valid = false;
        }
        if (empty($role)) {
            $roleError = 'ingrese role';
            $valid = false;
        }
         
        // insert data
        if($valid){
            try {
                $hash_dpi=encript::encrypt($dpi,$dpi);
                $conn=conexion::connect();
                $stml=$conn->prepare('INSERT INTO usuarios(username,password,dpi,email,role)
                VALUES (?,?,?,?,?)');
                $stml->execute(array("$nombre","$password","$hash_dpi","$email","$role"));
                header("Location: index.php");
            } catch (Exception $e) 
            {
                echo $sql . "<br>" . $e->getMessage();
            }
            

        }
        
        $conn = null;
    
    }
?>
<?php
function role(){
    $host = 'localhost';
    $user = 'root';
    $pass = 'melanie';
    mysql_connect($host, $user, $pass);
    mysql_select_db('dpi');
    $select=mysql_query("select name_role, description from roles group by name_role");
    while($row=mysql_fetch_array($select))
    {
        echo "<option value='".$row['name_role']."'>".$row['description']."</option>";
    }
}
?>

 
<div class="span10 offset1 container">
                    <div class="row">
                        <h3>Create a Customer</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                    <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
                            <label class="control-label">Nombre</label>
                            <div class="controls">
                                <input class="form-control" name="nombre" type="text"  placeholder="Nombre de usuario ..." value="<?php echo !empty($nombre)?$nombre:'';?>">
                                <?php if (!empty($nombreError)): ?>
                                    <span class="text-danger"><?php echo $nombreError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    
                        <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
                            <label class="control-label">Contraseña</label>
                            <div class="controls">
                                <input class="form-control" name="password" type="text" placeholder="Contraseña ..." value="<?php echo !empty($password)?$password:'';?>">
                                <?php if (!empty($passwordError)): ?>
                                    <span class="text-danger"><?php echo $passwordError;?></span>
                                <?php endif;?>
                            </div>
                        </div>
                  
                        <div class="control-group <?php echo !empty($dpiError)?'error':'';?>">
                            <label class="control-label">DPI</label>
                            <div class="controls">
                                <input class="form-control" name="dpi" type="text"  placeholder="DPI" value="<?php echo !empty($dpi)?$dpi:'';?>">
                                <?php if (!empty($dpiError)): ?>
                                    <span class="text-danger"><?php echo $dpiError;?></span>
                                <?php endif;?>
                            </div>
                        </div>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">E-mail</label>
                        <div class="controls">
                            <input class="form-control" name="email" type="text"  placeholder="E-mail ..." value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="text-danger"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($roleError)?'error':'';?>">
                        <label class="control-label">Role</label>
                        <div class="controls">
                        <select class="form-control" name="role" id="role">
                        <?php
                            role();
                        ?>
                        </select>
                            <?php if (!empty($roleError)): ?>
                                <span class="help-inline"><?php echo $roleError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Crear</button>
                          <a class="btn" href="index.php">Atras</a>
                        </div>
                    </form>
            
                 
    </div> <!-- /container -->
  </body>
</html>