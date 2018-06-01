<?php

  $error = ""; //Variable for storing our errors.

  function is_valid_customer($username,$password){
    global $db;

    $query = "SELECT *
              FROM customer
              WHERE Username = :username AND Password = :password";

    $statement = $db->prepare($query);
    $statement->bindValue(":username",$username,PDO::PARAM_STR);
    $statement->bindValue(":password",$password,PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetch();
    $rows = $statement->rowCount();

    if($rows === 1){
      $_SESSION["Username"] = $username;
      $_SESSION["is_loggedin"] = true;
      header("Location: /MovieStore/");
    }else{
      $error = "Incorrect username or password.";
    }
  }


?>
