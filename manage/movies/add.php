<?php include "../../view/header.php"; ?>
  <main class="mb-4" style="margin-top: 5em">
    <div class="container">
      <h1>Add movie</h1>
      <hr>
      <div class="border px-4 py-4">
        <form action="upload.php" method="post" enctype="multipart/form-data">

        </form>
        <form class="col-md-8" action="action" method="post">
          <div class="d-flex form-group">
            <label class="w-25" for="">Title:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="" value="">
          </div>
          <div class="d-flex form-group">
            <label class="w-25" for="">Actors/Actresses:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="" value="">
          </div>
          <div class="d-flex form-group">
            <label class="w-25" for="">Director/s:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="" value="">
          </div>
          <div class="d-flex form-group">
            <label class="w-25" for="">Description:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="" value="">
          </div>
          <div class="d-flex form-group">
            <label class="w-25" for="">Length:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="" value="">
          </div>
          <div class="d-flex form-group">
            <label class="w-25" for="">Genre:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="" value="">
          </div>
          <div class="d-flex form-group">
            <label class="w-25" for="">Release Date:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="" value="">
          </div>
          <div class="d-flex form-group">
            <label class="w-25" for="">Price:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="" value="">
          </div>
          <div class="">
            <label for="">Select poster to upload:</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
          </div>
          <div class="d-flex justify-content-end">
            <input class="btn btn-outline-dark" type="submit" name="btn_add" value="Add">
          </div>
          <a href="/MovieStore/manage/movies/">back to list</a>
        </form>

      </div>

    </div>
  </main>
</div>
<?php include "../../view/footer.php" ?>
