<?php $pageTitle = "Movie Details" ?>
<?php include "../../view/header.php"; ?>
  <section style="margin-top: 5em">
    <div class="container">
      <nav class="w-25" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Library</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
      </nav>
      <h1>Details movies</h1>
      <hr>
      <div class="row">
        <div class="d-flex justify-content-justify col-md-12 mt-3 py-3 bg-dark">
          <div class="col-md-4">
            <img src="/MovieStore/images/posters/<?php echo $movie["Image_Name"] ?>" height="400" alt="">
          </div>
          <div class="col-md-8 text-white">
            <h2 class="mb-4"><?php echo $movie["Title"] ?></h2>
            <p><span class="font-weight-bold">Release Date:</span> <?php echo $movie["Release_Date"] ?></p>
            <p><span class="font-weight-bold">Genre: </span><?php echo rtrim($genres,",") ?></p>
            <p class="font-weight-bold mb-1">Overview</p>
            <p><?php echo $movie["Overview"] ?></p>
            <p class="font-weight-bold">Director</p>
          </div>
        </div>
        <div class="col-12 my-3"><hr></div>
        <div class="col-md-12 px-0">
          <div class="container">
            <h3>Top Cast:</h3>
            <div class="row justify-content-center border py-3 mb-5">
              <?php foreach($actors as $results) : ?>
                <div class="col-md-2">
                  <div class="card">
                    <img src="/MovieStore/images/actors/<?php echo $results["img"] ?>" height="200" alt="">
                    <div class="card-body">
                      <p><?php echo $results["FirstName"] . " " . $results["LastName"] ?></p>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include "../../view/footer.php" ?>
