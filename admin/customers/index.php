<?php
require_once("../../model/database.php");
require_once("../../model/admindb.php");
require_once("../../model/moviedb.php");

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
  if ($action == NULL) {
      $action = 'view';
  }
}

switch ($action) {
    case 'view':
        $customers = get_all_customers();
        include("view_customers.php");
        break;
    case 'delete':
        if(isset($_POST["uname"]) && isset($_POST["psw"])){
          $uname = $_POST["uname"];
          $pswrd = $_POST["psw"];
          is_admin($uname, $pswrd);
          header("Location: /MovieStore/admin/");
        }

        include("login.php");
        break;
    default:

  }

?>
