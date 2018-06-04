<?php $pageTitle = "View Cart" ?>
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
            <table class="table table-striped">
              <thead>
                <tr class="d-flex">
                    <th class="col-3">Item</th>
                    <th class="col-2">Price</th>
                    <th class="col-2">Quantity</th>
                    <th class="col-2">Total</th>
                    <th class="col-3">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cart as $product_id => $item) : ?>
                <tr class="d-flex">
                    <th class="col-3">
                      <div class="img-overlay-container">
                        <img src="/MovieStore/images/posters/<?php echo $item["poster"] ?>" height="200" alt="">
                        <div class="overlay">
                          <?php echo htmlspecialchars($item['title']); ?>
                        </div>
                      </div>
                    </th>
                    <td class="col-2">
                        <?php echo sprintf('$%.2f', $item['price']); ?>
                    </td>
                    <td class="col-2">
                        <input type="text" size="3" class="form-control "
                               name="items[<?php echo $product_id; ?>]"
                               value="<?php echo $item['quantity']; ?>">
                    </td>
                    <td class="col-2">
                      <?php echo sprintf('$%.2f', $item["total"]) ?>
                    </td>
                    <td class="col-3">
                      <a href="<?php echo "" ?>">Remove item</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr class="d-flex">
                  <th class="col-3"><b>Subtotal</b></th>
                  <td class="col-6"></td>
                  <td class="col-3">
                      <?php echo sprintf('$%.2f', cart_subtotal()); ?>
                  </td>
                </tr>
                <tr class="d-flex">
                  <td class="col-9"></td>
                  <td class="col-3">
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
