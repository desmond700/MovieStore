<?php $pageTitle = "Login" ?>
<?php include("../view/header.php") ?>
    <section class="container" style="margin-top: 5em">
      <div class="container d-flex">
        <form class="mx-auto w-50" action="." method="post">
          <h1>Login</h1>
         <div class="imgcontainer">
           <i class="fa fa-user-circle text-success" style="font-size:100px"></i>
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


         <div class="d-flex container" style="background-color:#f1f1f1">
           <label class="my-auto">
             <input type="checkbox" checked="checked" name="remember"> Remember me
           </label>
           <span class="psw py-0 ml-auto my-auto">Forgot <a href="#">password?</a></span>
         </div>
         <?php echo $error ?>
        </form>
      </div>
    </section>
  </div>
<?php include("../view/footer.php") ?>
