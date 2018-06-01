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
            <table id="cart" class="table">
              <thead>
                <tr id="cart_header">
                    <th scope="col" class="col-md-3">Item</th>
                    <th scope="col" class="col-md-3">Price</th>
                    <th scope="col" class="col-md-3">Quantity</th>
                    <th scope="col" class="col-md-3">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cart as $product_id => $item) : ?>
                <tr scope="row">
                    <td class="mr-4">
                      <div class="img-overlay-container">
                        <img src="/MovieStore/images/posters/<?php echo $item["poster"] ?>" height="200" alt="">
                        <div class="overlay">
                          <?php echo htmlspecialchars($item['title']); ?>
                        </div>
                      </div>
                    </td>
                    <td class="right">
                        <?php echo sprintf('$%.2f', $item['price']); ?>
                    </td>
                    <td class="right">
                        <input type="text" size="3" class="form-control w-25"
                               name="items[<?php echo $product_id; ?>]"
                               value="<?php echo $item['quantity']; ?>">
                    </td>
                    <td class="right">
                      <?php echo sprintf('$%.2f', $item["total"]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr id="cart_footer" scope="row">
                    <td colspan="3" class="right" ><b>Subtotal</b></td>
                    <td class="right">
                        <?php echo sprintf('$%.2f', cart_subtotal()); ?>
                    </td>
                </tr>
                <tr scope="row" class="w-100">
                  <td class="col-md-3"></td>
                  <td class="col-md-3"></td>
                  <td class="col-md-3"></td>
                    <td class="col-md-3">
                        <input type="submit" value="Update Cart">
                    </td>
                </tr>
              </tbody>
            </table>
          </form>
        <?php endif ?>
      </div>
    </main>
  </div>
<?php include("../view/footer.php") ?>
