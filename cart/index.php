<?php
  require_once("../model/database.php");
  require_once("../model/cart.php");
  require_once("../model/moviedb.php");

  $action = filter_input(INPUT_POST, 'action');
  if ($action == NULL) {
      $action = filter_input(INPUT_GET, 'action');
      if ($action == NULL) {
          $action = 'view';
      }
  }

  switch ($action) {
    case 'view':

        break;
    case 'add':

        break;
    case 'update':

        break;
    default:

  }

  include("./view.php");

?>
