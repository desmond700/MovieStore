<?php

require_once('../model/database.php');
require_once('../model/customerdb.php');
require_once('../model/moviedb.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
  if ($action == NULL) {
      $action = 'login';
      if (isset($_SESSION['Username'])) {
          $action = 'view';
      }
  }
}

switch ($action) {
    case 'registration':
        include("registration.php");
        break;
    case 'login':
        $error = ""; //Variable for storing our errors.

        if(empty($_POST["uname"]) || empty($_POST["pswrd"])){
          $error = "Both fields are required.";
        }else{
          // Define $username and $password
          $username = $_POST["uname"];
          $password = $_POST["pswrd"];
          is_valid_customer($username,$password);
        }

        include("login.php");
        break;
    case 'view':
        if(filter_input(INPUT_GET, "customerid") !== NULL){
          $customer_id = filter_input(INPUT_GET, "customerid");
          $customer = get_customer_by_id($customer_id);
        }

        include("view.php");
        break;
    case 'edit':
        include("edit.php");
        break;
    case 'logout':
       unset($_SESSION['username']);
       unset($_SESSION['user_type']);
       unset($_SESSION['is_loggedin']);
       header('Location: ../');
       break;
   default:
       //display_error("Unknown account action: " . $action);
       break;
 }

?>
