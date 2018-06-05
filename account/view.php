<?php $pageTitle = "View Account" ?>
<?php include "../view/header.php"; ?>
  <main  style="margin:5em 0 21em 0">
    <div class="container">
      <h1>My Account</h1>
      <hr>
      <form class="" action="index.html" method="post">
        <table class="table table-striped">
          <thead>
            <tr class="d-flex">
              <th class="col-1">ID</th>
              <th class="col-2">Username</th>
              <th class="col-2">Firstname</th>
              <th class="col-2">Lastname</th>
              <th class="col-2">Email</th>
              <th class="col-2">Password</th>
              <th class="col-1">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr class="d-flex">
              <td class="col-1">
                <?php echo $customer["Customer_id"] ?>
              </td>
              <td class="col-2">
                <input class="form-control" type="text" value="<?php echo $customer["UserName"] ?>">
              </td>
              <td class="col-2">
                <input class="form-control" type="text" value="<?php echo $customer["FirstName"] ?>">
              </td>
              <td class="col-2">
                <input class="form-control" type="text" value="<?php echo $customer["LastName"] ?>">
              </td>
              <td class="col-2">
                <input class="form-control" type="text" value="<?php echo $customer["Email"] ?>">
              </td>
              <td class="col-2">
                <input class="form-control" type="text" value="<?php echo $customer["Password"] ?>">
              </td>
              <td class="col-1">
                <a href="#">Update</a>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>

  </main>
</div>
<?php include "../view/footer.php" ?>
