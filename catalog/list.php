<?php $pageTitle = "List Movies" ?>
<?php include ("../view/header.php"); ?>
  <section class="" style="margin: 5em 0 5em 0">

    <div class="container px-0">
      <nav class="w-25" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/MovieStore/">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a href="?action=list">List Movies</a></li>
        </ol>
      </nav>
      <h1>List Movies</h1>
      <div class="d-flex col-md-12 justify-content-between py-4 px-0">
        <div class="d-flex w-75">
          <div class="d-flex w-25 pr-5">
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
            <input type="submit" class="btn btn-outline-dark ml-2" name="" value="Filter">
          </form>
        </div>

        <p class="my-auto">Entries: <span class=""><?php echo get_movies_count() ?></span></p>
      </div>
      <div class="row mx-0  justify-content-between" id="list">
        <?php foreach ($movies as $movie) : ?>
              <div class="card img-overlay-container mt-4" style="width:200px; height:auto">
                <a href="?action=view&filmid=<?php echo $movie["Film_id"] ?>" class="w-100">
                  <img class="img-fluid" src="/MovieStore/images/posters/<?php echo $movie["Image_Name"] ?>" height="300" alt="">
                  <div class="overlay"><?php echo $movie["Title"] ?></div>
                </a>
              </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</div>
<?php include "../view/footer.php" ?>
