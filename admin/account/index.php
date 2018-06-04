<?php

require_once("../../model/database.php");
require_once("../../model/admindb.php");
require_once("../../model/moviedb.php");

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
  if ($action == NULL) {
      $action = 'login';
      if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === "admin") {
          header("Location: ./?action=view&adminid=".$_SESSION['admin_id']);
      }
  }
}

switch ($action) {
    case 'registration':
        include("registration.php");
        break;
    case 'login':
        if(isset($_POST["uname"]) && isset($_POST["psw"])){
          $uname = $_POST["uname"];
          $pswrd = $_POST["psw"];
          is_admin($uname, $pswrd);
          header("Location: /MovieStore/admin/");
        }

        include("login.php");
        break;
    case 'view':
        if(filter_input(INPUT_GET, "adminid") !== NULL){
          $admin_id = filter_input(INPUT_GET, "adminid");
          $admin = get_admin_by_id($admin_id);
        }
        include("view.php");
        break;
    case 'edit':
        include("edit.php");
        break;
    case 'logout':
       unset($_SESSION['username']);
       unset($_SESSION['user_type']);
       unset($_SESSION["admin_id"]);
       unset($_SESSION['is_loggedin']);
       header('Location: ../');
       break;
   default:
       //display_error("Unknown account action: " . $action);
       break;
 }

?>
