<?php $pageTitle = "List Movies" ?>
<?php include ("../../view/header.php"); ?>
  <section style="margin-top: 5em">

    <div class="container px-0">
      <nav class="w-25" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Library</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
      </nav>
      <h1>List Movies</h1>
      <div class="d-flex col-md-12 justify-content-between py-4 px-0">
        <div class="d-flex w-25">
          <label class="my-auto">Genre:&nbsp;</label>
          <select name="sectionid" class="form-control" onchange="window.location.href = this.value">" >
              <option value="">All</option>
              <?php $genres = get_genres();  foreach ($genres as $genre) : ?>
                  <option value="?genre_id=<?php echo $genre["Genre_id"] ?>"><?php echo $genre["Genre"] ?></option>
              <?php endforeach;?>
          </select>
        </div>
        <form class="d-flex w-25" action="<?php if(isset($_POST["title"]))echo $_POST["title"] ?>">
          <label class="my-auto">Title:&nbsp;</label>
          <input type="text" class="form-control" name="title" value="">
          <input type="submit" class="btn btn-outline-light text-dark ml-2" name="" value="filter">
        </form>
        <p class="my-auto">Entries: <span class=""><?php echo get_movies_count() ?></span></p>
        <a class="my-auto" href="?action=add_movie">Add movie</a>
      </div>
      <div class="row mx-0" id="list">
        <?php foreach ($movies as $movie) : ?>
          <div class="d-flex col-md-12 border mb-2 px-0 py-3">
            <div class="col-md-3">
              <div class="card img-overlay-container">
                <img src="/MovieStore/images/posters/<?php echo $movie["Image_Name"] ?>" height="200" alt="">
                <div class="overlay"><?php echo $movie["Title"] ?></div>
              </div>

            </div>
            <div class="col-md-3">
              <h4>Release Date</h4>
              <div class=""><?php echo $movie["Release_Date"] ?></div>
            </div>
            <div class="col-md-2">
              <h4>Price</h4>
              <p class="text-danger">CDN$ <?php echo $movie["Price"] ?></p>
            </div>
            <div class="col-md-1">
              <h4>Rating</h4>
              <p class=""><?php echo $movie["Rating"] ?></p>
            </div>
            <div class="d-flex col-md-3 justify-content-end">
              <h4></h4>
              <div class="d-flex align-self-end">
                <a href="?action=edit_movie&filmid=<?php echo $movie["Film_id"] ?>">Edit</a>|
                <a href="?action=movie_details&filmid=<?php echo $movie["Film_id"] ?>">Details</a>|
                <a href="?action=delete_movie&filmid=<?php echo $movie["Film_id"] ?>">Delete</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</div>
<?php include "../../view/footer.php" ?>
