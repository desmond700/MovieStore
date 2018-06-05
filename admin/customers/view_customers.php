<?php $pageTitle = "View Account" ?>
<?php include "../../view/header.php"; ?>
<main  style="margin:5em 0 19em 0">
  <div class="container">
    <h1>List Customers</h1>
    <hr>
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
        <?php foreach($customers as $customer) : ?>
        <tr class="d-flex">
          <td class="col-1">
            <?php echo $customer["Customer_id"] ?>
          </td>
          <td class="col-2">
            <?php echo $customer["UserName"] ?>
          </td>
          <td class="col-2">
            <?php echo $customer["FirstName"] ?>
          </td>
          <td class="col-2">
            <?php echo $customer["LastName"] ?>
          </td>
          <td class="col-2">
            <?php echo $customer["Email"] ?>
          </td>
          <td class="col-2">
            <?php echo $customer["Password"] ?>
          </td>
          <td class="col-1">
            <form action="?action=delete" method="post">
              <input type="hidden" name="film_id" value="<?php echo $customer["Customer_id"] ?>">
              <input class="btn btn-outline-danger" type="submit" name="submit" value="Delete">
            </form>
          </td>
        </tr>
      <?php endforeach ?>
      </tbody>
    </table>
  </div>
</main>
<?php include "../../view/footer.php" ?>
