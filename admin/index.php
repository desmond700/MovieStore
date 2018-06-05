<?php

  session_start();
  if (isset($_SESSION["user_type"])){
    if($_SESSION["user_type"] != "admin")
      header("Location: ./account/");
  }else {
    header("Location: ./account/");
  }

?>
<?php $pageTitle = "Admin Panel" ?>
<?php include("../view/header.php"); ?>
    <main style="margin:5em 0 15em 0">
      <div class="container">
        <h1 class="py-4">Admin Panel</h1>
        <hr>
        <div class="list-group">
          <a href="account" class="d-block list-group-item list-group-item-action">
            Account
          </a>
          <a href="movies" class="d-block list-group-item list-group-item-action">
            Movies
          </a>
          <a href="customers" class="d-block list-group-item list-group-item-action">
            Customers
          </a>
        </div>
      </div>
    </main>
  </div>
<?php include("../view/footer.php") ?>
