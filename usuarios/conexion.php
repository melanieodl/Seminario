<?php
class conexion{
   

    public function connect(){
        $servername = "localhost";
        $username = "root";
        $password = "melanie";
        $dbname = "dpi";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;

    }   
}