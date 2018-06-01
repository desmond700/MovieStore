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
        $cart = cart_get_items();
        break;
    case 'add':
        $product_id = $_GET['product_id'];
        $quantity = $_GET['quantity'];

        cart_add_item($product_id, $quantity);
        $cart = cart_get_items();
        break;
    case 'update':

        break;
    default:

  }

  include("./view.php");

?>
