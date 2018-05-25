<?php
    $dsn = "mysql:host=localhost;dbname=moviestoredb";
    $username = "root";
    $password = "password";

    try{
      $db = new PDO($dsn, $username, $password);
    }catch(PDOExeception $e){
      $error_message = $e->getMessage();
      include("../error/database_error.php");
      exit();
    }

?>
