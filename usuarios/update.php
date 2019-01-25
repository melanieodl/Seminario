<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $nombreError = null;
        $emailError = null;
        $passwordError = null;
        $dpiError = null;
        $roleError = null;
        
         
        // keep track post values
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $dpi = $_POST['dpi'];
        $role = $_POST['role'];
        
         
        // validate input
        $valid = true;
        if (empty($nombre)) {
            $nombreError = 'Ingresar nombre';
            $valid = false;
        }
        if (!empty($email)) {
            if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
                $emailError = 'Ingresar e-mail';
                $valid = false;
            }
        } 
         
        if (empty($password)) {
            $passwordError = 'Ingresar password';
            $valid = false;
        }
        if (empty($dpi)) {
            $dpiError = 'Ingresar password';
            $valid = false;
        }
        if (empty($role)) {
            $roleError = 'Ingresar role';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE customers  set name = ?, email = ?, mobile =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$email,$mobile,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM usuarios where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $nombre = $data['username'];
        $password = $data['password'];
        $dpi=$data['dpi'];
        $email = $data['email'];
        $role = $data['role'];
        Database::disconnect();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Actualizar usuarios</h3>
                    </div>
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="nombre" type="text"  placeholder="Nombre usuario ..." value="<?php echo !empty($nombre)?$nombre:'';?>">
                            <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="password" type="text" placeholder="Contraseña ..." value="<?php echo !empty($password)?$password:'';?>">
                            <?php if (!empty($passwordError)): ?>
                                <span class="help-inline"><?php echo $passwordError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($dpiError)?'error':'';?>">
                        <label class="control-label">DPI</label>
                        <div class="controls">
                            <input name="dpi" type="text"  placeholder="Dpi" value="<?php echo !empty($dpi)?$dpi:'';?>">
                            <?php if (!empty($dpiError)): ?>
                                <span class="help-inline"><?php echo $dpiError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">E-mail</label>
                        <div class="controls">
                            <input name="email" type="text"  placeholder="E-mail" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($roleError)?'error':'';?>">
                        <label class="control-label">Role</label>
                        <div class="controls">
                            <input name="role" type="text"  placeholder="Role ..." value="<?php echo !empty($role)?$role:'';?>">
                            <?php if (!empty($roleError)): ?>
                                <span class="help-inline"><?php echo $roleError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
    </body>
    </html>