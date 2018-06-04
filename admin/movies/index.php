<?php
  session_start();
  if (isset($_SESSION["user_type"])){
    if($_SESSION["user_type"] != "admin")
      header("Location: ../account/");
  }else {
    header("Location: ../account/");
  }

  require_once("../../model/database.php");
  require_once("../../model/moviedb.php");
  require_once("../../model/addfilm.php");
  require_once("../../model/updatefilm.php");


  $action = filter_input(INPUT_POST, 'action');
  if($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL){
      $action = "list_movies";
    }
  }


  if($action == "list_movies"){
    $title = filter_input(INPUT_GET, 'title');
    $genre = filter_input(INPUT_GET, 'genre_id');
    if($title != NULL || $genre != NULL) {
      if($title != NULL){
        $movies = get_by_title($title);
      }
      if($genre != NULL){
        $movies = get_by_genre($genre);
      }
    }
    else{
      $movies = get_movies();
    }

    include ("./list.php");

  }else if($action == "add_movie"){

    if(isset($_POST['title']) && isset($_POST['runtime']) && isset($_POST['releasedate']) &&
       isset($_POST['rating']) && isset($_POST['price']) && isset($_POST['overview']) &&
       isset($_POST['directors']) && isset($_POST['genres']) && isset($_FILES["Film_image"]["name"]) &&
       isset($_FILES['actorimg']["name"]) && isset($_FILES["Film_image"]["name"]) && isset($_REQUEST['characters'])){
      $title = $_POST['title'];
      $run_time = $_POST['runtime'];
      $release_date = $_POST['releasedate'];
      $rating = $_POST['rating'];
      $price = $_POST['price'];
      $overview = $_POST['overview'];
      $actorsimg = $_FILES['actorimg']["name"];
      $image_name = basename($_FILES["Film_image"]["name"]);
      $actors = $_REQUEST['actors'];
      $directors = $_POST['directors'];
      $genres = $_POST['genres'];
      $characters = $_REQUEST['characters'];
      add_movie($title,$run_time,$release_date,$rating,$price,$overview,$image_name,$actors,$actorsimg,$directors,$genres,$characters);
      $added = "Filmed Added to database.";
    }

    include ("./add.php");

  }else if($action == "edit_movie"){
    if(filter_input(INPUT_GET, 'filmid') != NULL){
      $film_id = filter_input(INPUT_GET, 'filmid');
      $movie = get_a_movie_by_id($film_id);
      $columns = get_film_column_names();
      $actors = get_actors_names_by_film_id($film_id);
      $genres = get_genres_by_film_id($film_id);
      $characters = get_characters_by_film_id($film_id);
    }

    if(isset($_POST['title']) && isset($_POST['runtime']) && isset($_POST['releasedate']) &&
       isset($_POST['rating']) && isset($_POST['price']) && isset($_POST['overview']) &&
       isset($_POST['directors']) && isset($_POST['genres']) && isset($_FILES["Film_image"]["name"]) &&
       isset($_REQUEST['characters'])){
      $title = $_POST['title'];
      $run_time = $_POST['runtime'];
      $release_date = $_POST['releasedate'];
      $rating = $_POST['rating'];
      $price = $_POST['price'];
      $overview = $_POST['overview'];
      $actorsimg = $_FILES['actorimg']["name"];
      $image_name = basename($_FILES["Film_image"]["name"]);
      $actors = $_REQUEST['actors'];
      $directors = $_POST['directors'];
      $genres = $_POST['genres'];
      $characters = $_REQUEST['characters'];
      update_film($title,$run_time,$release_date,$rating,$price,$overview,$image_name,$actors,$actorsimg,$directors,$genres,$characters);
      $added = "Filmed Added to database.";
    }

    include ("edit.php");

  }else if($action == "movie_details"){
    if(filter_input(INPUT_GET, 'filmid') != NULL){
      $film_id = filter_input(INPUT_GET, 'filmid');
      $movie = get_a_movie_by_id($film_id);
      $actors = get_actors_by_film_id($film_id);
      $genres = get_genres_by_film_id($film_id);
    }
    include ("details.php");

  }else if($action == "delete_movie"){
    include ("details.php");
  }
?>
