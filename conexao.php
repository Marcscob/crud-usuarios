
<?php
  
$host = "localhost";
$user="root";
$pass="";
$db= "crud_users";

$mysqli=new mysqli($host, $user, $pass, $db);
if($mysqli -> connect_errno) {
    die("Falha na conexão com o bd");
}

?>