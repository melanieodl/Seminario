<?php
class encript{
public function encrypt($string, $key)
{
 $result = '';
 for($i=0; $i<strlen($string); $i++)
{
 $char = substr($string, $i, 1);
 $keychar = substr($key, ($i % strlen($key))-1, 1);
 $char = chr(ord($char)+ord($keychar));
 $result.=$char;
 }
 return base64_encode($result);
}
//funsion para desencriptar el texto de la primera funsion
//recibe el texto previamente encriptaro y la misma llave
public function decrypt($string, $key)
{
 $result = '';
 $string = base64_decode($string);
 for($i=0; $i<strlen($string); $i++)
{
 $char = substr($string, $i, 1);
 $keychar = substr($key, ($i % strlen($key))-1, 1);
 $char = chr(ord($char)-ord($keychar));
 $result.=$char;
 }
return $result;
}

public function hash($password){
    $pass=password_hash($password,PASSWORD_DEFAULT);
    
    return $pass;
}

}