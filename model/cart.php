<?php
session_start();
// Create an empty cart if it doesn't exist
if (!isset($_SESSION['cart']) ) {
    $_SESSION['cart'] = array();
}

function cart_add_item($product_id, $quantity) {
    if(isset($_SESSION["user_id"]))
      $_SESSION['cart'][$_SESSION["user_id"]][$product_id] = round($quantity, 0);
    else
      $_SESSION['cart']['guest'][$product_id] = round($quantity, 0);

    // Set last category added to cart
    //$product = get_product($product_id);
    //$_SESSION['last_category_id'] = $product['categoryID'];
    //$_SESSION['last_category_name'] = $product['categoryName'];
}

// Get an array of items for the cart
function cart_get_items() {
    $items = array();

    if(isset($_SESSION['cart'][$_SESSION['user_id']])){
      foreach ($_SESSION['cart'][$_SESSION['user_id']] as $product_id => $quantity ) {
          // Get product data from db
          $product = get_a_movie_by_id($product_id);
          $price = $product['Price'];
          $quantity = intval($quantity);

          // Calculate discount
          $unitTotal = $price * $quantity;

          // Store data in items array
          $items[$product_id]['title'] = $product['Title'];
          $items[$product_id]['poster'] = $product['Image_Name'];
          $items[$product_id]['overview'] = $product['Overview'];
          $items[$product_id]['price'] = $price;
          $items[$product_id]['total'] = $unitTotal;
          $items[$product_id]['quantity'] = $quantity;
      }
    }else if(isset($_SESSION['cart']["guest"])){
      foreach (isset($_SESSION['cart']["guest"]) as $product_id => $quantity ) {
          // Get product data from db
          $product = get_a_movie_by_id($product_id);
          $price = $product['Price'];
          $quantity = intval($quantity);

          // Calculate discount
          $unitTotal = $price * $quantity;

          // Store data in items array
          $items[$product_id]['title'] = $product['Title'];
          $items[$product_id]['poster'] = $product['Image_Name'];
          $items[$product_id]['overview'] = $product['Overview'];
          $items[$product_id]['price'] = $price;
          $items[$product_id]['total'] = $unitTotal;
          $items[$product_id]['quantity'] = $quantity;
      }
    }

    return $items;
}


function cart_product_count() {
  if(isset($_SESSION['cart'][$_SESSION['user_id']])){
    return count($_SESSION['cart'][$_SESSION['user_id']]);
  }else if(isset($_SESSION['cart']['guest'])){
    return count($_SESSION['cart']['guest']);
  }
}


function cart_subtotal () {
    $subtotal = 0;
    $cart = cart_get_items();
    foreach ($cart as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }
    return $subtotal;
}

?>
