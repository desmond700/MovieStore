<?php include("../view/header.php"); ?>
    <main style="margin-top:5em">
      <div class="container">
        <h1 class="py-4">Admin Panel</h1>
        <hr>
        <div class="list-group">
          <a href="account/?action=login" class="d-block list-group-item list-group-item-action">
            Account
          </a>
          <a href="orders" class="d-block list-group-item list-group-item-action">
            Orders
          </a>
          <a href="movies" class="d-block list-group-item list-group-item-action">
            Movies
          </a>
        </div>
      </div>
    </main>
  </div>
<?php include("../view/footer.php") ?>
