<?php $pageTitle = "Add Movie" ?>
<?php include "../../view/header.php"; ?>
  <main class="mb-4" style="margin-top: 5em">
    <div class="container">
      <h1>Add movie</h1><?php echo "Genre_id: ".$genre[2] ?>
      <hr>
      <div class="border px-4 py-4">
        <form class="col-md-8" action="?action=add_movie" method="post" enctype="multipart/form-data">
          <div class="d-flex form-group border-bottom pb-3">
            <label class="col-sm-4 col-md-3 pl-0">Title:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="title" placeholder="Enter Movie's title">
          </div>
          <div class="d-flex justify-content-between pl-0 border-bottom ">
            <div class="form-group w-50 pr-2">
              <label class="pl-0">Actors/Actresses:&nbsp;</label>
              <input class="form-control form-control-sm mb-1" type="text" name="actors[]" placeholder="Enter Actor's/Actress's first and last names">
              <input class="form-control form-control-sm mb-1" type="text" name="actors[]" placeholder="Enter Actor's/Actress's first and last names">
              <input class="form-control form-control-sm mb-1" type="text" name="actors[]" placeholder="Enter Actor's/Actress's first and last names">
              <input class="form-control form-control-sm mb-1" type="text" name="actors[]" placeholder="Enter Actor's/Actress's first and last names">
              <input class="form-control form-control-sm mb-1" type="text" name="actors[]" placeholder="Enter Actor's/Actress's first and last names">
            </div>
            <div class="form-group w-50 pl-2 border-left">
              <label class=" pl-0">Characters:&nbsp;</label>
              <input class="form-control form-control-sm mb-1" type="text" name="characters[]" placeholder="Enter Characters's name">
              <input class="form-control form-control-sm mb-1" type="text" name="characters[]" placeholder="Enter Characters's name">
              <input class="form-control form-control-sm mb-1" type="text" name="characters[]" placeholder="Enter Characters's name">
              <input class="form-control form-control-sm mb-1" type="text" name="characters[]" placeholder="Enter Characters's name">
              <input class="form-control form-control-sm mb-1" type="text" name="characters[]" placeholder="Enter Characters's name">
            </div>
          </div>
          <div class="d-flex form-group pt-3">
            <label class="col-sm-4 col-md-3 pl-0">Length:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="runtime" placeholder="Enter Movie's Run time">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Genre/s:&nbsp;</label>
            <select name="genres[]" class="form-control" multiple>
                <option value="">--Select a genre</option>
                <?php $genresResults = get_genres();  foreach ($genresResults as $genre) : ?>
                    <option value="<?php echo $genre["Genre"] ?>"><?php echo $genre["Genre"] ?></option>
                <?php endforeach;?>
            </select>
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Release Date:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" id="datepicker" name="releasedate" placeholder="Select Released Date">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Price:&nbsp;</label>
            <input class="form-control form-control-sm" type="text" name="price" placeholder="Enter Movie's price">
          </div>
          <div class="d-flex form-group">
            <label class="col-sm-4 col-md-3 pl-0">Rating:&nbsp;</label>
            <select name="rating" class="form-control">" >
                <option value="">--Select a Rating</option>
                <option value="G">G</option>
                <option value="PG">PG</option>
                <option value="PG-13">PG-13</option>
                <option value="R">R</option>
                <option value="NC-17">NC-17</option>
            </select>
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
