<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'angelzero87A');
define('DB_NAME', 'dpi');
$con = @mysqli_connect('localhost', 'root', 'angelzero87A', 'dpi');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}



?>
