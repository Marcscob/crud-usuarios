
<?php
  
$host = "localhost";
$user="root";
$pass="";
$db= "crud_users";

$mysqli=new mysqli($host, $user, $pass, $db);
if($mysqli -> connect_errno) {
    die("Falha na conexão com o bd");
}


  

//>>>>>>> ea6bcf1f39402503d486467af531cb6e92fa5819
?>