<?php

  if (session_status() !== PHP_SESSION_ACTIVE) session_start();

  if(isset($_POST["favourite_id"])){
    delete_favourite($_POST["favourite_id"]);
  }

  if(isset($_SESSION["is_loggedin"])){
    if(isset($_SESSION["username"])){
      $user = $_SESSION["username"];
      if($_SESSION["user_type"] !== "admin")
        if(isset($_SESSION["customer_id"])){
          get_favourite($_SESSION["customer_id"]);

        }

    }
    else if(isset($_SESSION["admin"]))
      $user = $_SESSION["admin"];
  }else{
    $user = "guest";
    $_SESSION["user_type"] = "guest";
  }
?>
<!Doctype html>
<html>
<head>
  <title><?php echo $pageTitle ?> - MovieStore inc.</title>
  <meta charset="UTF-8">
  <meta name="description" content="The most up to date Movie Repository">
  <meta name="keywords" content="HD,Movies,Action,Drama,Comedy">
  <meta name="author" content="Desmond Wallace">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/MovieStore/css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="/MovieStore/js/main.js"></script>
</head>
<body>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalCenterTitle"><?php echo $movie["Title"] ?> trailer</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo $movie["Trailer"] ?>" allowfullscreen></iframe>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div id="mySidenav" class="d-flex flex-column sidenav pt-0">
    <section class="d-flex">
      <a href="javascript:void(0)" class="closebtn d-flex my-auto py-0" onclick="closeNav()">x</a>
      <a href="/MovieStore/" class="d-flex my-auto ml-auto">
        <i class="fa fa-film text-primary my-auto ml-auto" style="font-size:32px"></i>
        <span class="my-auto" style="font-size:32px">MovieStore</span>
      </a>
    </section>
    <section class="asideMenu">
      <h4 class="pl-3 ">Menu-</h4>
      <a href="/MovieStore/">Home</a>
      <a href="/MovieStore/catalog/">Movies</a>
    </section>
    <?php if(isset($_SESSION["username"]) && isset($_SESSION["favourite"])) : ?>
    <section class="mt-3">
      <h4 class="pl-3 ">Favourites-</h4>
      <div class="container-fluid">
        <div class="row">
          <?php foreach($_SESSION["favourite"] as $film_id => $value) : ?>
            <div class="d-flex col-md-12 py-3 border-top">
              <div class="img-overlay-container">
                <a class="px-0 py-0" href="/MovieStore/catalog/?action=view&filmid=<?php echo $film_id ?>"><img src="/MovieStore/images/posters/<?php echo $value["poster"] ?>" width="100" alt="">
                  <div class="overlay">
                    <?php echo $value["Title"] ?>
                  </div>
                </a>
              </div>
              <div class="mx-3">
                <p class="mb-1"><span class="font-weight-bold">Release Date:</span> <?php echo $value["ReleaseDate"] ?></p>
                <p class="mb-1"><span class="font-weight-bold">Run time:</span> <?php echo $value["Runtime"] ?></p>
                <p class="mb-1"><span class="font-weight-bold">Rating:</span> <?php echo $value["Rating"] ?></p>
                <form class="" action="." method="post">
                  <input type="hidden" name="favourite_id" value="<?php echo $value["Favourite_id"] ?>">
                  <input class="px-0 py-0 btn btn-light" type="submit" value="Remove">
                </form>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </section>
    <?php endif; ?>
    <section class="my-4 ">
      <h4 class="pl-3 ">Administration-</h4>
      <a href="/MovieStore/admin/">Admin</a>
    </section>
  </div>
  <div class="container-fluid px-0">
    <nav class="d-flex flex-column fixed-top navbar-light bg-light shadow-lg">
      <div class="d-flex justify-content-center col-12 py-2 border-bottom" id="mobiLogo"></div>
      <div class="navbar-content d-flex justify-content-between">
        <div class="d-flex">
          <div class="menu my-auto px-3" onclick="openNav()">
           <div class="bar1"></div>
           <div class="bar2"></div>
           <div class="bar3"></div>
          </div>
          <div class="d-flex mr-2" id="logoCln">
            <a href="/MovieStore/" class="d-flex my-auto logo">
              <i class="fa fa-film text-primary my-auto" style="font-size:32px"></i>
              <span class="my-auto text-secondary" style="font-size:32px">MovieStore</span>
            </a>
          </div>
        </div>

        <form id="search-lg" class="col-sm-4 col-md-5 form-inline my-2" action="/MovieStore/search" method="post">
          <input class="form-control flex-grow-1 mr-sm-2" type="text" name="title" placeholder="Search" aria-label="Search">
          <input class="btn btn-outline-dark ml-auto my-2 my-sm-0" type="submit" value="search">
        </form>
        <button class="d-flex btn btn-outline-dark w-75 mx-auto my-auto px-1 py-1" id="mobilSrch">
          <i class="fa fa-search mx-auto" style="font-size:28px"></i>
        </button>
        <div class="d-flex">
          <div class="d-flex border-left">
            <a href="/MovieStore/cart/" class="btn btn-light d-block d-flex my-auto h-100">
              <i class="fa fa-shopping-cart my-auto text-dark" style="font-size:28px"></i>
            </a>
          </div>
          <div class="d-flex border-left border-right">
          <div class="dropdown d-flex flex-column">
            <button class="d-flex align-items-center btn btn-light dropdown-toggle h-100 py-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="d-flex">
                <i class="fa fa-user-circle mx-1 my-auto" style="font-size:28px"></i>
                <?php if($_SESSION["user_type"] == "admin") : ?>
                  <div class="d-flex flex-column mx-1 my-auto">
                    <span class="my-auto font-weight-bold"><?php echo $user ?></span>
                    <small class="textsecondary">admin</small>
                  </div>
                <?php else : ?>
                  <span class="my-auto"><?php echo $user ?></span>
                <?php endif ?>
              </div>
            </button>
            <div class="dropdown-menu dropdown-menu-right px-2" aria-labelledby="dropdownMenuButton">
              <?php if(!isset($_SESSION["is_loggedin"])) : ?>
                <div class="d-flex">
                  <div class="dropdown my-auto h-100">
                    <a href="/MovieStore/account/?action=login" class="btn btn-light h-100">
                      Login
                    </a>
                  </div>

                  <div class="dropdown my-auto h-100">
                    <a href="/MovieStore/account/?action=registration" class="btn btn-light h-100">
                      Signup
                    </a>
                  </div>
                </div>
              <?php else : ?>
                <div class="dropdown my-auto h-100 w-100">
                  <?php if($_SESSION["user_type"] === "customer") : ?>
                    <a href="/MovieStore/account/?action=view&customerid=<?php echo $_SESSION["customer_id"] ?>" class="btn btn-light h-100 w-100 border-bottom">
                      My Account
                    </a>
                    <a href="/MovieStore/account/?action=logout" class="btn btn-light h-100 w-100">
                      Logout
                    </a>
                  <?php else: ?>
                    <a href="/MovieStore/admin/account/?action=view&adminid=<?php echo $_SESSION["admin_id"] ?>" class="btn btn-light h-100 w-100 border-bottom">
                      My Account
                    </a>
                    <a href="/MovieStore/admin/account/?action=logout" class="btn btn-light h-100 w-100">
                      Logout
                    </a>
                  <?php endif ?>
                </div>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>

    </nav>
