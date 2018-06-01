<?php include("../view/header.php") ?>
    <section class="container" style="margin-top: 5em">
      <div class="container">
        <form class="mx-auto w-50" action="action_page.php">
            <h1>Registration</h1>
            <div class="imgcontainer">
              <img src="img_avatar2.png" alt="Avatar" class="avatar">
            </div>
            <div class="form-group">
              <label for="uname"><b>Username</b></label>
              <input class="form-control" type="text" placeholder="Enter Username" name="uname" required>
            </div>
            <div class="form-group">
              <label for="uname"><b>Email</b></label>
              <input class="form-control" type="email" placeholder="Enter Username" name="email" required>
            </div>
            <div class="form-group">
              <label for="psw"><b>Password</b></label>
              <input class="form-control" type="password" placeholder="Enter Password" name="psw" required>
            </div>
            <div class="form-group">
              <label for="psw"><b>Confirm Password</b></label>
              <input class="form-control" type="password" placeholder="Enter Password" name="cpsw" required>
            </div>
            <button class="btn btn-success" type="submit">Login</button>


         <div class="d-flex justify-content-between" style="background-color:#f1f1f1">
           <label class="my-auto pt-4">
             <input type="checkbox" checked="checked" name="remember"> Remember me
           </label>
           <span class="psw my-auto pt-4">Forgot <a href="#">password?</a></span>
         </div>
        </form>
      </div>
    </section>
  </div>
<?php include("../view/footer.php") ?>
