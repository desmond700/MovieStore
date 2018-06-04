<?php
  session_start();
  function is_admin($username, $password){
    global $db;

    $query = "SELECT *
              FROM admin
              WHERE Username = :username AND Password = :password";

    $statement = $db->prepare($query);
    $statement->bindValue(":username", $username);
    $statement->bindValue(":password", $password);
    $statement->execute();
    $result = $statement->fetch();
    $rows = $statement->rowCount();

    if($rows === 1){
      if(isset($_SESSION["username"])){
        unset($_SESSION["username"]);
        unset($_SESSION["customer_id"]);
        unset($_SESSION["user_type"]);
        unset($_SESSION["is_loggedin"]);
        $_SESSION["username"] = $username;
        $_SESSION["user_type"] = "admin";
        $_SESSION["admin_id"] = $result["Admin_id"];
        $_SESSION["is_loggedin"] = true;
      }else{
        $_SESSION["username"] = $username;
        $_SESSION["user_type"] = "admin";
        $_SESSION["admin_id"] = $result["Admin_id"];
        $_SESSION["is_loggedin"] = true;
      }

      return "true";
    }else
      $error = "Incorrect username or password.";
  }

  function get_admin_by_id($admin_id){
    global $db;
    $query = "SELECT *
              FROM admin
              WHERE Admin_id = :admin_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":admin_id", $admin_id);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();

    return $result;
  }

  function get_all_customers(){
    global $db;
    $query = "SELECT *
              FROM customer";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return $results;
  }

 ?>
