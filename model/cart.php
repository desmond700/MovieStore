<?php
// Create an empty cart if it doesn't exist
if (!isset($_SESSION['cart']) ) {
    $_SESSION['cart'] = array();
}

function cart_add_item($product_id, $quantity) {
    $_SESSION['cart'][$product_id] = round($quantity, 0);

    // Set last category added to cart
    $product = get_product($product_id);
    $_SESSION['last_category_id'] = $product['categoryID'];
    $_SESSION['last_category_name'] = $product['categoryName'];
}

// Get an array of items for the cart
function cart_get_items() {
    $items = array();
    foreach ($_SESSION['cart'] as $product_id => $quantity ) {
        // Get product data from db
        $product = get_a_movie_by_id($product_id);
        $list_price = $product['listPrice'];
        $discount_percent = $product['discountPercent'];
        $quantity = intval($quantity);

        // Calculate discount
        $discount_amount = round($list_price * ($discount_percent / 100.0), 2);
        $unit_price = $list_price - $discount_amount;
        $line_price = round($unit_price * $quantity, 2);

        // Store data in items array
        $items[$product_id]['name'] = $product['productName'];
        $items[$product_id]['description'] = $product['description'];
        $items[$product_id]['list_price'] = $list_price;
        $items[$product_id]['discount_percent'] = $discount_percent;
        $items[$product_id]['discount_amount'] = $discount_amount;
        $items[$product_id]['unit_price'] = $unit_price;
        $items[$product_id]['quantity'] = $quantity;
        $items[$product_id]['line_price'] = $line_price;
    }
    return $items;
}


function cart_product_count() {
  return count($_SESSION['cart']);
}

?>
