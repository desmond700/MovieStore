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
          <input type="submit" class="btn btn-outline-primary ml-2" name="" value="Filter">
        </form>
        <p class="my-auto">Entries: <span class=""><?php echo get_movies_count() ?></span></p>
        <a class="my-auto btn btn-outline-dark" href="?action=add_movie">Add movie</a>
      </div>
      <div class="row mx-0" id="list">

            <?php foreach ($movies as $movie) : ?>
              <div class="container-fluid d-flex col-md-12 my-3 py-3 border-bottom">
                <div class="row">
                  <div class="col-12 col-md-2">
                    <h4>Movie</h4>
                    <div class="img-overlay-container">
                      <img class="img-fluid" src="/MovieStore/images/posters/<?php echo $movie["Image_Name"] ?>" alt="">
                      <div class="overlay"><?php echo $movie["Title"] ?></div>
                    </div>
                  </div>
                  <div class="col-12 col-md-2">
                    <h4>Released Date</h4>
                    <p class=""><?php echo $movie["Release_Date"] ?></p>
                  </div>
                  <div class="col-12 col-md-2">
                    <h4>Price</h4>
                    <p class="text-danger">CDN$ <?php echo $movie["Price"] ?></p>
                  </div>
                  <div class="col-12 col-md-1">
                    <h4>Rating</h4>
                    <p class=""><?php echo $movie["Rating"] ?></p>
                  </div>
                  <div class="col-12 col-md-2">
                    <h4>Genre</h4>
                    <?php foreach(get_genres_by_film_id($movie["Film_id"]) as $genre) : ?>
                      <p><?php echo $genre["Genre"] ?></p>
                    <?php endforeach ?>
                  </div>
                  <div class="col-1 col-md-3">
                    <h4>Action</h4>
                    <div class="d-flex">
                      <a class="btn btn-success ml-1" href="?action=edit_movie&filmid=<?php echo $movie["Film_id"] ?>">Edit</a>
                      <a class="btn btn-warning text-white ml-1" href="?action=movie_details&filmid=<?php echo $movie["Film_id"] ?>">Details</a>
                      <form class=" ml-1" action="?action=delete_movie" method="post">
                        <input type="hidden" name="film_id" value="<?php echo $movie["Film_id"]; ?>">
                        <input class="btn btn-danger" type="submit" value="Delete">
                      </form>
                    </div>
                  </div>
                </div>

              </div>
            <?php endforeach; ?>


      </div>
    </div>
  </section>
</div>
<?php include "../../view/footer.php" ?>
