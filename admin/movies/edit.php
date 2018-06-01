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
          <div class="d-flex form-groupp border-bottom pb-3">
            <label class="col-sm-4 col-md-3 pl-0">Title:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="title" value="<?php echo $movie["Title"] ?>">
          </div>
          <div class="d-flex justify-content-between pl-0 pt-3 border-bottom ">
            <div class="form-grou w-50 pr-2">
              <label class="pl-0">Actors/Actresses:&nbsp;</label>
              <?php foreach($actors as $actor) : ?>
                <input class="form-control form-control-sm mb-1" type="text" value="<?php echo $actor["FirstName"]." ".$actor["LastName"] ?>" name="actors[]">
              <?php endforeach ?>
            </div>
            <div class="form-group w-50 pl-2 border-left">
              <label class=" pl-0">Characters:&nbsp;</label>
              <?php foreach($characters as $character) : ?>
                <input class="form-control form-control-sm mb-1" type="text" value="<?php echo $character["Name"] ?>" name="characters[]">
              <?php endforeach ?>
            </div>
          </div>
          <div class="d-flex form-group pt-3" id="directorInput">
            <label class="col-sm-4 col-md-3 pl-0">Director/s:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="directors" value="<?php echo $movie["Title"] ?>">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Length:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="runtime" value="<?php echo $movie["Run_time"] ?>">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Genre/s:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="genres" value="<?php echo $genres ?>">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Release Date:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="releasedate"  id="datepicker" value="<?php echo $movie["Release_Date"] ?>">
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
