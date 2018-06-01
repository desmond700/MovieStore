<?php include("../view/header.php"); ?>
    <main style="margin-top:5em">
      <div class="container">
        <h1>Cart</h1>
        <hr>
        <?php if(cart_product_count() == 0) : ?>
          <p>There are no products in your cart.</p>
        <?php else: ?>
          <form action="." method="post">
            <input type="hidden" name="action" value="update">
            <table id="cart">
              <tr id="cart_header">
                  <th class="left">Item</th>
                  <th class="right">Price</th>
                  <th class="right">Quantity</th>
                  <th class="right">Total</th>
              </tr>
              <?php foreach ($cart as $product_id => $item) : ?>
              <tr>
                  <td><?php echo htmlspecialchars($item['name']); ?></td>
                  <td class="right">
                      <?php echo sprintf('$%.2f', $item['unit_price']); ?>
                  </td>
                  <td class="right">
                      <input type="text" size="3" class="right"
                             name="items[<?php echo $product_id; ?>]"
                             value="<?php echo $item['quantity']; ?>">
                  </td>
                  <td class="right">
                      <?php echo sprintf('$%.2f', $item['line_price']); ?>
                  </td>
              </tr>
              <?php endforeach; ?>
              <tr id="cart_footer" >
                  <td colspan="3" class="right" ><b>Subtotal</b></td>
                  <td class="right">
                      <?php echo sprintf('$%.2f', cart_subtotal()); ?>
                  </td>
              </tr>
              <tr>
                  <td colspan="4" class="right">
                      <input type="submit" value="Update Cart">
                  </td>
              </tr>
            </table>
          </form>
        <?php endif ?>
      </div>
    </main>
  </div>
<?php include("../view/footer.php") ?>
