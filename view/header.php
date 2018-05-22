<!Doctype html>
<html>
<head>
  <title> - MovieStore inc.</title>
  <meta charset="UTF-8">
  <meta name="description" content="The most up to date Movie Repository">
  <meta name="keywords" content="HD,Movies,Action,Drama,Comedy">
  <meta name="author" content="Desmond Wallace">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</head>
<body>
  <div id="mySidenav" class="d-flex flex-column sidenav pt-0">
    <section class="">
      <a href="" class="d-flex my-auto float-right">
        <i class="fa fa-film text-primary my-auto" style="font-size:32px"></i>
        <span class="my-auto" style="font-size:32px">MovieStore</span>
      </a>
    </section>
    <section class="asideMenu">
      <h4 class="pl-3 ">Menu-</h4>
      <a href="#">Home</a>
      <a href="#">Movies</a>
      <a href="#">Clients</a>
      <a href="#">Contact</a>
    </section>

    <section class="mt-5">
      <h4 class="pl-3 ">Favourites-</h4>

    </section>
  </div>
  <div class="container-fluid px-0">
    <nav class="d-flex flex-column navbar-light bg-light shadow-lg">
      <div class="d-flex justify-content-center col-12 py-2 border-bottom" id="mobiLogo"></div>
      <div class="navbar-content d-flex justify-content-between">
        <div class="d-flex">
          <div class="menu my-auto px-3" onclick="myFunction(this);toggleSideBar()">
           <div class="bar1"></div>
           <div class="bar2"></div>
           <div class="bar3"></div>
          </div>
          <div class="d-flex mr-2" id="logoCln">
            <a href="" class="d-flex my-auto logo">
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
            <a href="cart/" class="btn btn-light d-block d-flex my-auto h-100">
              <i class="fa fa-shopping-cart my-auto text-dark" style="font-size:28px"></i>
            </a>
          </div>
          <div class="d-flex border-left border-right">
            <div class="dropdown my-auto h-100">
              <button class="btn btn-light dropdown-toggle h-100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
              </button>
              <div class="dropdown-menu dropdown-menu-right px-2" aria-labelledby="dropdownMenuButton">
                <div class="d-flex">
                  <div class="dropdown my-auto h-100">
                    <button class="btn btn-light dropdown-toggle h-100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      login
                    </button>
                    <div class="dropdown-menu dropdown-menu-right px-2" aria-labelledby="dropdownMenuButton" style="min-width:300px">
                      <h4 class="text-center font-weight-bold">Log in</h4>
                      <hr>
                      <form class="form px-2">
                        <div class="form-group">
                          <label class=" font-weight-bold" for="exampleInputEmail1">Username:</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                          <label class=" font-weight-bold" for="exampleInputPassword1">Password:</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <p><a href="#">forgot password?</a></p>
                        <button type="submit" class="btn btn-primary float-right">Log in</button>
                      </form>
                    </div>
                  </div>

                  <div class="dropdown my-auto h-100">
                    <button class="btn btn-light dropdown-toggle h-100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      signup
                    </button>
                    <div class="dropdown-menu dropdown-menu-right px-2" aria-labelledby="dropdownMenuButton" style="min-width:300px">
                      <h4 class="text-center font-weight-bold">Sign Up</h4>
                      <hr>
                      <form class="form px-2">
                        <div class="form-group">
                          <label class=" font-weight-bold" for="exampleInputEmail1">Username:</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                          <label class=" font-weight-bold" for="exampleInputEmail1">Email:</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                          <label class=" font-weight-bold" for="exampleInputPassword1">Password:</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                          <label class=" font-weight-bold" for="exampleInputPassword1">Confirm password:</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Sign up</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="d-flex flex-column px-2 px-lg-3 py-2">
            <i class="fa fa-user-circle mx-auto my-auto" style="font-size:28px"></i>
            <span>guest</span>
          </div>
        </div>
      </div>

    </nav>
