<?php $pageTitle = "Movie Details" ?>
<?php include "../view/header.php"; ?>
  <section style="margin-top: 5em">
    <div class="container">
      <nav class="w-50" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/MovieStore/">Home</a></li>
          <li class="breadcrumb-item"><a href="./">List Movies</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo $movie["Title"] ?></li>
        </ol>
      </nav>
      <h1>Details movies</h1>
      <hr>
      <div class="row">
        <div class="d-flex justify-content-justify col-md-12 mt-3 py-3 bg-dark">
          <div class="row">
            <div class="col-8 col-md-3">
              <div class="card bg-dark border-0">
                <img src="/MovieStore/images/posters/<?php echo $movie["Image_Name"] ?>" height="400" alt="">
                <button class="mt-3 mr-auto" class="btn btn-outline-light bg-secondary text-white" data-toggle="modal" data-target="#exampleModalCenter">Watch trailer</button>
              </div>
            </div>
            <div class="col-md-9 d-flex flex-column text-white px-4 pt-sm-4 pt-md-0">
              <h2 class="mb-4"><?php echo $movie["Title"] ?></h2>
              <p><span class="font-weight-bold">Release Date:</span> <?php echo $movie["Release_Date"] ?></p>
              <p><span class="font-weight-bold">Genre: </span><?php echo rtrim($genres,",") ?></p>
              <p class="font-weight-bold mb-1">Overview</p>
              <p><?php echo $movie["Overview"] ?></p>
              <p class="font-weight-bold">Director</p>
              <div class="d-flex w-100 mt-auto ml-auto">

                <form class="d-flex" action="." method="get" id="add_to_cart_form">
                    <input type="hidden" name="action" value="add_favourite" />
                    <input type="hidden" name="filmid" value="<?php echo $movie["Film_id"] ?>" />
                    <input class="btn btn-outline-light bg-primary text-white" type="submit" value="add to favourites" />
                </form>

                <form class="d-flex ml-auto" action="../cart/" method="get" id="add_to_cart_form">
                    <input type="hidden" name="action" value="add" />
                    <input type="hidden" name="product_id"
                           value="<?php echo $movie["Film_id"] ?>" />
                    <div class="d-flex my-auto mr-3">
                      <b class="my-auto">Quantity:</b>&nbsp;
                      <input class="form-control" type="text" name="quantity" style="width:40px" value="1" size="2" />
                    </div>
                    <input class="btn btn-outline-light bg-warning text-white" type="submit" value="Add to Cart" />
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 my-3"><hr></div>
        <div class="col-md-12 px-0">
          <div class="container">
            <h3>Top Cast:</h3>
            <div class="row justify-content-center border py-3 mb-5">
              <?php foreach($actors as $results) : ?>
                <div class="col-2 col-sm-4 col-md-2">
                  <div class="card">
                    <img class="img-fluid" src="/MovieStore/images/actors/<?php echo $results["img"] ?>" alt="">
                    <div class="card-body">
                      <p><?php echo $results["FirstName"] . " " . $results["LastName"] ?></p>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include "../view/footer.php" ?>
