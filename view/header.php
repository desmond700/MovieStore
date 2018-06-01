<?php
  session_start();

  if(isset($_SESSION["is_loggedin"]) && $_SESSION["is_loggedin"]){
    $user = $_SESSION["Username"];
  }else{
    $user = "guest";
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
    <?php if(isset($_SESSION["is_loggedin"]) && $_SESSION["is_loggedin"]) : ?>
    <section class="mt-3">
      <h4 class="pl-3 ">Favourites-</h4>

    </section>
    <?php endif; ?>
    <section class="mt-3">
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

        <form class="col-sm-4 col-md-5 form-inline my-2" id="search-lg">
          <input class="form-control flex-grow-1 mr-sm-2" type="search" placeholder="Search" aria-label="Search">
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
            <button class="btn btn-light dropdown-toggle h-100 pb-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="d-flex flex-column">
                <i class="fa fa-user-circle mx-auto" style="font-size:28px"></i>
                <span class="my-auto"><?php echo $user ?></span>
              </div>
            </button>
            <div class="dropdown-menu dropdown-menu-right px-2" aria-labelledby="dropdownMenuButton">
              <div class="d-flex">
                <div class="dropdown my-auto h-100">
                  <a href="/MovieStore/account/?action=login" class="btn btn-light h-100">
                    login
                  </a>
                </div>

                <div class="dropdown my-auto h-100">
                  <a href="/MovieStore/account/?action=registration" class="btn btn-light h-100">
                    signup
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </nav>
