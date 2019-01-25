<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'melanie');
define('DB_NAME', 'dpi');
$con = @mysqli_connect('localhost', 'root', 'melanie', 'dpi');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}



?>