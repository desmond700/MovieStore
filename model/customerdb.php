<?php
  session_start();
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
      if(isset($_SESSION["username"])){
        unset($_SESSION["username"]);
        unset($_SESSION["user_type"]);
        unset($_SESSION["admin_id"]);
        unset($_SESSION["is_loggedin"]);
        $_SESSION["username"] = $username;
        $_SESSION["user_type"] = "customer";
        $_SESSION["is_loggedin"] = true;
        $_SESSION["customer_id"] = $result["Customer_id"];
      }else{
        $_SESSION["username"] = $username;
        $_SESSION["user_type"] = "customer";
        $_SESSION["is_loggedin"] = true;
        $_SESSION["customer_id"] = $result["Customer_id"];
      }

      header("Location: /MovieStore/");
    }else{
      $error = "Incorrect username or password.";
    }
  }

  function get_customer_by_id($customer_id){
    global $db;
    $query = "SELECT *
              FROM customer
              WHERE Customer_id = :customer_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":customer_id", $customer_id);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();

    return $result;
  }
?>
