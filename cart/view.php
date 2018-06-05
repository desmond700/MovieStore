<?php $pageTitle = "View Cart" ?>
<?php include("../view/header.php"); ?>
    <main style="margin-top:5em">
      <div class="container">
        <h1>Cart</h1>
        <hr>
        <?php if(cart_product_count() == 0) : ?>
          <p>There are no products in your cart.</p>
        <?php else: ?>
            <div class="my-4">

                <?php foreach ($cart as $product_id => $item) : ?>
                  <div class="d-flex col-md-12 mb-4">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-12 col-sm-3">
                          <h4>Item</h4>
                          <div class="img-overlay-container" style="width:200px">
                            <img class="img-fluid" src="/MovieStore/images/posters/<?php echo $item["poster"] ?>" alt="">
                            <div class="overlay">
                              <?php echo htmlspecialchars($item['title']); ?>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-2">
                          <h4>Price</h4>
                            <div class="text-danger"></div><?php echo sprintf('$%.2f', $item['price']); ?>
                        </div>

                        <div class="col-12 col-sm-2">
                          <h4>Quantity</h4>
                            <input type="text" style="width:40px" class="form-control "
                                   name="items[<?php echo $product_id; ?>]"
                                   value="<?php echo $item['quantity']; ?>">
                        </div>
                        <div class="col-12 col-sm-2">
                          <h4>Total</h4>
                          <div class=" text-danger"><?php echo sprintf('$%.2f', $item["total"]) ?></div>
                        </div>
                        <div class="col-12 col-sm-3">
                          <h4>Action</h4>
                          <div class="d-flex">
                            <form class="mr-2" action="." method="post">
                              <input class="btn btn-outline-primary" type="submit" value="Update item">
                            </form>
                            <form action="?action=remove" method="post">
                              <input type="hidden" name="film_id" value="<?php echo $product_id ?>"/>
                              <input class="btn btn-outline-danger" type="submit" value="Remove item"/>
                            </form>
                          </div>

                      </div>
                      </div>
                    </div>


                  </div>
                <?php endforeach; ?>
                  <div class="d-flex w-100">
                    <b class="mr-auto">Subtotal</b>
                  <span class=" text-danger ml-auto">
                      CDN<?php echo sprintf('$%.2f', cart_subtotal()); ?>
                  </span>
                </div>
            </div>
        <?php endif ?>
      </div>
    </main>
  </div>
<?php include("../view/footer.php") ?>
