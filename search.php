<?php
  require_once("model/database.php");
  require_once("model/moviedb.php");

  if(isset($_POST['title'])){
    $movie = get_by_title($_POST['title']);
  }
  echo "film id: ".$_POST['title'];
?>
<?php $pageTitle = "Search Movie" ?>
<?php include "view/header.php"; ?>
  <main class="container" style="margin-top: 5em">
    <h1 class="text-center">(<?php if(isset($movie)) echo count($movie) ?>)Search Results</h1>
    <hr>
    <div class="row">
      <?php if(isset($movie)) : ?>
      <?php foreach($movie as $key => $value) : ?>
        <div class="col-md-12 border-bottom py-3">
          <div class="container-fluid">
            <div class="row">

              <div class="col-12 col-md-3">
                <a href="/MovieStore/catalog/?action=view&filmid=<?php echo $key ?>"><img src="images/posters/<?php echo $value['Image_Name'] ?>" width="240" alt="Movie poster"></a>
              </div>
              <div class="col-12 col-md-9">
                <h3 class="py-2"><?php echo $value['Title'] ?></h3>
                <p><b>Release Date:</b> <?php echo $value['Title'] ?></p>
                <div class="d-flex">
                  <p><b>Genre:&nbsp;</b></p>
                  <div class="">
                    <?php foreach(get_genres_by_film_id($key) as $genre) : ?>
                      <p><?php echo $genre["Genre"] ?></p>
                    <?php endforeach ?>
                  </div>
                </div>
                <p><b>Price: </b><span class="text-danger">CDN$<?php echo $value['Price'] ?></span></p>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    <?php else: ?>
      <p class="text-center w-100">No Results found</p>
    <?php endif ?>
    </div>
  </main>
  </div>
<?php include "view/footer.php" ?>
