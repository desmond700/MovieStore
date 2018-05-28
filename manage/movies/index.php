<?php
  require ("../../model/database.php");
  //require "../../model/categorydb.php";
  require ("../../model/moviedb.php");
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

    if(isset($_POST['title'])){
      $title = $_POST['title'];
      $run_time = $_POST['runtime'];
      $release_date = $_POST['releasedate'];
      $rating = $_POST['rating'];
      $price = $_POST['price'];
      $overview = $_POST['overview'];
      $image_name = basename($_FILES["fileToUpload"]["name"]);
      $actors = $_POST['actors'];
      $directors = $_POST['directors'];
      $genres = $_POST['genres'];
      $characters = $_POST['characters'];
      add_movie($title,$run_time,$release_date,$rating,$price,$overview,$image_name,$actors,$directors,$genres,$characters);
    }

    include ("./add.php");

  }else if($action == "edit_movie"){
    if(filter_input(INPUT_GET, 'filmid') != NULL){
      $film_id = filter_input(INPUT_GET, 'filmid');
      $movie = get_a_movie_by_id($film_id);
      $columns = get_film_column_names();
    }

    include ("edit.php");

  }else if($action == "movie_details"){
    if(filter_input(INPUT_GET, 'filmid') != NULL){
      $film_id = filter_input(INPUT_GET, 'filmid');
      $movie = get_a_movie_by_id($film_id);
      $actors = get_actors_by_film_id($film_id);
    }
    include ("details.php");

  }else if($action == "delete_movie"){
    include ("details.php");
  }
?>
