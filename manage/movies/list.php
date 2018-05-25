<?php include ("../../view/header.php"); ?>
  <section style="margin-top: 5em">

    <div class="container">
      <div class="d-flex"><h1>List Movies</h1><a class="ml-auto my-auto" href="?action=add_movie">Add movie</a></div>
      <div class="row">
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
            </div>
            <div class="d-flex col-md-3 justify-content-end">
              <h4></h4>
              <div class="d-flex align-self-end">
                <a href="?action=edit_movie&filmid=<?php echo $movie["Film_id"] ?>">Edit</a>|
                <a href="?action=movie_detail&filmid=<?php echo $movie["Film_id"] ?>">Details</a>|
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
