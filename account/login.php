<?php $pageTitle = "Login" ?>
<?php include("../view/header.php") ?>
    <section class="container" style="margin-top: 5em">
      <div class="container d-flex">
        <form class="mx-auto w-50" action="." method="post">
          <h1>Login</h1><?php echo "username: ".$username." password: ".$password ?>
         <div class="imgcontainer">
           <img src="img_avatar2.png" alt="Avatar" class="avatar">
         </div>
          <div class="form-group">
            <label for="uname"><b>Username</b></label>
            <input class="form-control" type="text" placeholder="Enter Username" name="uname" required>
          </div>
          <div class="form-group">
            <label for="psw"><b>Password</b></label>
            <input class="form-control" type="password" placeholder="Enter Password" name="pswrd" required>
          </div>

           <button class="btn btn-success" name="submit" type="submit">Login</button>
           <label>
             <input type="checkbox" checked="checked" name="remember"> Remember me
           </label>

         <div class="container" style="background-color:#f1f1f1">
           <button type="button" class="btn btn-danger cancelbtn">Cancel</button>
           <span class="psw">Forgot <a href="#">password?</a></span>
         </div>
         <?php echo $error ?>
        </form>
      </div>
    </section>
  </div>
<?php include("../view/footer.php") ?>
