<?php require ("model/database.php"); ?>
<?php require ("model/moviedb.php"); ?>
<?php $pageTitle = "Home" ?>
<?php include ("view/header.php"); ?>
    <div class="bg-dark py-4" style="margin-top:4em">
      <div class="container">
        <div class="row">
          <div class="d-flex flex-column col-12 col-md-6 px-2">
            <h2 class="text-white">Coming Soon</h2>
            <div class="px-0 h-100">
              <div class="container-fluid px-0 h-100">
                <div class="row justify-content-center">
                  <div class="col-md-12 px-0 img-overlay-container">
                    <a href="/MovieStore/catalog/?action=view&filmid=<?php echo get_a_movie('Jurassic World: Fallen Kingdom') ?>">
                      <img class="img-fluid" src="https://i.ytimg.com/vi/I5N8GymdRio/maxresdefault.jpg" alt="">
                      <div class="overlayVisible">Jurassic World: Fallen Kingdom (2018)</div>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-6 px-0 img-overlay-container">
                    <a href="/MovieStore/catalog/?action=view&filmid=<?php echo get_a_movie('Mission: Impossible - Fallout') ?>">
                      <img class="img-fluid h-100" src="http://cdn-static.denofgeek.com/sites/denofgeek/files/2018/02/fallout.jpg"  style="width:100%;" alt="">
                      <div class="overlayVisible">Mission: Impossible - Fallout (2018)</div>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-6 px-0 img-overlay-container">
                    <a href="/MovieStore/catalog/?action=view&filmid=<?php echo get_a_movie('The Equalizer 2') ?>">
                      <img class="img-fluid h-100" src="http://bestwatchbrandshq.com/wp-content/uploads/2018/04/Denzel-Washington-Watch-In-The-Equalizer-2-Movie.jpg" style="width:100%;" alt="">
                      <div class="overlayVisible">The Equalizer 2 (2018)</div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex flex-column col-12 col-md-6 px-2">
            <h2 class="text-white">In Theater</h2>
            <div class="h-100 px-0">
              <div class="container-fluid px-0 h-100">
                <div class="row h-100 mx-0  justify-content-center">
                  <div class="col-sm-6 col-md-6 px-0 img-overlay-container">
                    <a href="/MovieStore/catalog/?action=view&filmid=<?php echo get_a_movie('Rampage') ?>">
                      <img class="img-fluid" src="http://s3-us-west-1.amazonaws.com/mediastinger/wp-content/uploads/2018/04/06152304/Rampage-2018-after-credits-hq.jpg" alt="">
                      <div class="overlayVisible">Rampage (2018)</div>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-6 px-0 img-overlay-container">
                    <a href="/MovieStore/catalog/?action=view&filmid=<?php echo get_a_movie('The Avengers: Infinity War') ?>">
                      <img class="img-fluid" src="http://cdn.wegotthiscovered.com/wp-content/uploads/2017/09/21082913_264370074054238_4920788646889854495_o.jpg" alt="">
                      <div class="overlayVisible">Avengers: Infinity War (2018)</div>
                    </a>
                  </div>
                  <div class="d-flex col-md-12 px-0 img-overlay-container">
                    <a href="/MovieStore/catalog/?action=view&filmid=<?php echo get_a_movie('Deadpool 2') ?>">
                      <img class="img-fluid" src="https://cdn.vox-cdn.com/thumbor/Ttwwar-56OJ21pROmryNCbDEBKs=/0x0:1382x2048/1200x800/filters:focal(175x884:395x1104)/cdn.vox-cdn.com/uploads/chorus_image/image/59798029/deadpool_2_poster.0.jpg" style="width:100%;height:px" alt="">
                      <div class="overlayVisible">Deadpool 2 (2018)</div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>


      </div>
    </div>
    <section>
      <div class="container mt-4">
        <h3 class="text-center">Feature</h3>
        <hr>
        <div class="row px-4">
          <?php foreach(get_movies() as $id => $movie) : ?>
            <?php if(($id % 2) != 0)continue; ?>
            <div class="card img-overlay-container mt-4 mx-2" style="width:200px; height:auto">
              <a href="/MovieStore/catalog/?action=view&filmid=<?php echo $movie["Film_id"] ?>" class="w-100">
                <img class="img-fluid" src="/MovieStore/images/posters/<?php echo $movie["Image_Name"] ?>" height="300" alt="">
                <div class="overlay"><?php echo $movie["Title"] ?></div>
              </a>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </section>
  </div>

<?php include "view/footer.php" ?>
