<?php $pageTitle = "Add Movie" ?>
<?php include "../../view/header.php"; ?>
  <main class="mb-4" style="margin-top: 5em">
    <div class="container">
      <h1>Add movie</h1>
      <hr>
      <div class="border px-4 py-4">
        <form action="upload.php" method="post" enctype="multipart/form-data">

        </form>
        <form class="col-md-8" action="?action=add_movie" method="post" enctype="multipart/form-data">
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Title:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="title" placeholder="Enter Movie's title">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Actors/Actresses:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="actors" placeholder="Enter Actor's/Actress's first and last names">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Characters:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="characters" placeholder="Enter Characters's name">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Description:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="overview" placeholder="Enter Movie's overview">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Length:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="runtime" placeholder="Enter Movie's Run time">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Genre/s:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="genres" placeholder="Enter Movie's genre/s">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Release Date:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="releasedate" placeholder="Enter Movie's release date">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Price:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="price" placeholder="Enter Movie's price">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Rating:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="rating" placeholder="Enter Movie's rating">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Overview:&nbsp;</label>
            <textarea class="form-control form-control-sm" cols="40" rows="8" name="overview"></textarea>
          </div>
          <div class="">
            <label for="">Select poster to upload:</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
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
