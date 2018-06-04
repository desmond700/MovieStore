<?php $pageTitle = "Registration" ?>
<?php include("../view/header.php") ?>
    <section class="container" style="margin-top: 5em">
      <div class="container">
        <form class="mx-auto w-50" action="?action=registration" method="post">
            <h1>Registration</h1>

            <div class="imgcontainer">
              <img src="img_avatar2.png" alt="Avatar" class="avatar">
            </div>
            <div class="form-group">
              <label for="uname"><b>Username</b></label>
              <input class="form-control" type="text" placeholder="Enter Username" name="uname" required>
            </div>
            <div class="form-group">
              <label for="fname"><b>Firstname</b></label>
              <input class="form-control" type="text" placeholder="Enter Firstname" name="fname" required>
            </div>
            <div class="form-group">
              <label for="lname"><b>Lastname</b></label>
              <input class="form-control" type="text" placeholder="Enter Lastname" name="lname" required>
            </div>
            <div class="form-group">
              <label for="email"><b>Email</b></label>
              <input class="form-control" type="email" placeholder="Enter Email" name="email" required>
            </div>
            <div class="form-group">
              <label for="psw"><b>Password</b></label>
              <input class="form-control" type="password" placeholder="Enter Password" name="psw" required>
            </div>
            <div class="form-group">
              <label for="cpsw"><b>Confirm Password</b></label>
              <input class="form-control" type="password" placeholder="Enter Password Again" name="cpsw" required>
            </div>
            <button class="btn btn-success" type="submit">Register</button>
            <?php if(isset($error))echo "<p class='my-2 text-danger'>".$error."</p>" ?></p>
        </form>
      </div>
    </section>
  </div>
<?php include("../view/footer.php") ?>
