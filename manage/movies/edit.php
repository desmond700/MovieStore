<?php $pageTitle = "Edit Movie" ?>
<?php include "../../view/header.php"; ?>
  <section style="margin-top: 5em">
    <div class="container">
      <div class="d-flex">
        <h1>Edit movie</h1>&nbsp;&nbsp;<span class="my-auto text-secondary" style="font-size:28px"> - <?php echo $movie["Title"] ?></span>
      </div>

      <hr>
      <div class="border px-4 py-4">
        <?php  ?>
        <form class="col-md-8" action="?action=add_movie" method="post" enctype="multipart/form-data">
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Title:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="title" value="<?php echo $movie["Title"] ?>">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Actors/Actresses:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="actors" value="<?php echo $movie["Title"] ?>">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Characters:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="characters" value="<?php echo $movie["Title"] ?>">
          </div>
          <div class="d-flex form-group" id="directorInput">
            <label class="col-sm-4 col-md-3 pl-0">Director/s:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="directors" value="<?php echo $movie["Title"] ?>">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Length:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="runtime" value="<?php echo $movie["Run_time"] ?>">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Genre/s:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="genres" value="<?php echo $movie["Title"] ?>">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Release Date:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="releasedate" value="<?php echo $movie["Release_Date"] ?>">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Price:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="price" value="<?php echo $movie["Price"] ?>">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Rating:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="rating" value="<?php echo $movie["Rating"] ?>">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Overview:&nbsp;</label>
            <textarea class="form-control form-control-sm" cols="40" rows="8" name="overview"><?php echo $movie["Overview"] ?></textarea>
          </div>
          <div class="">
            <label for="">Select poster to upload:</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
          </div>
          <div class="d-flex justify-content-end">
            <input class="btn btn-outline-dark" type="submit" name="btn_add" value="Save">
          </div>
          <a href="/MovieStore/manage/movies/">back to list</a>
        </form>

      </div>

    </div>
  </section>
</div>
<?php include "../../view/footer.php" ?>
