<?php $pageTitle = "Login" ?>
<?php include("../../view/header.php") ?>
    <section class="container" style="margin-top: 5em">
      <div class="container d-flex">
        <form class="mx-auto w-50" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          <h1>Admin Login</h1>
         <div class="imgcontainer">
           <img src="img_avatar2.png" alt="Avatar" class="avatar">
         </div>
          <div class="form-group">
            <label for="uname"><b>Username</b></label>
            <input class="form-control" type="text" placeholder="Enter Username" name="uname" required>
          </div>
          <div class="form-group">
            <label for="psw"><b>Password</b></label>
            <input class="form-control" type="password" placeholder="Enter Password" name="psw" required>
          </div>

           <button class="btn btn-success" name="submit" type="submit">Login</button>

         <div class="container" style="background-color:#f1f1f1">
           <label>
             <input type="checkbox" checked="checked" name="remember"> Remember me
           </label>
           <span class="psw">Forgot <a href="#">password?</a></span>
         </div>
        </form>
      </div>
    </section>
  </div>
<?php include("../../view/footer.php") ?>
