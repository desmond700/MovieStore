<?php $pageTitle = "View Cart" ?>
<?php include("../view/header.php"); ?>
    <main style="margin-top:5em">
      <div class="container">
        <h1>Cart</h1><?php /*var_dump($_SESSION['cart'])*/ echo "film id: ".$_POST['film_id']  ?>
        <hr>
        <?php if(cart_product_count() == 0) : ?>
          <p>There are no products in your cart.</p>
        <?php else: ?>
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
                    <td class="col-2 text-danger">
                        <?php echo sprintf('$%.2f', $item['price']); ?>
                    </td>

                    <td class="col-2">
                        <input type="text" size="3" class="form-control "
                               name="items[<?php echo $product_id; ?>]"
                               value="<?php echo $item['quantity']; ?>">
                    </td>
                    <td class="col-2 text-danger">
                      <?php echo sprintf('$%.2f', $item["total"]) ?>
                    </td>
                    <td class="d-flex col-3">
                    <form class="mr-2" action="." method="post">
                      <input class="btn btn-outline-primary" type="submit" value="Update item">
                    </form>
                    <form action="?action=remove" method="post">
                      <input type="hidden" name="film_id" value="<?php echo $product_id ?>"/>
                      <input class="btn btn-outline-danger" type="submit" value="Remove item"/>
                    </form>
                  </td>
                </tr>
                <?php endforeach; ?>
                <tr class="d-flex">
                  <th class="col-3"><b>Subtotal</b></th>
                  <td class="col-6"></td>
                  <td class="col-3 text-danger">
                      CDN<?php echo sprintf('$%.2f', cart_subtotal()); ?>
                  </td>
                </tr>
              </tbody>
            </table>
        <?php endif ?>
      </div>
    </main>
  </div>
<?php include("../view/footer.php") ?>
