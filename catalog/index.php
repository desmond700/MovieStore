<?php
  require ("../model/database.php");
  require ("../model/moviedb.php");
  $action = filter_input(INPUT_POST, 'action');
  if($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL){
      $action = "list";
    }
  }

  if($action == "list"){
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

  }else if($action == "view"){
    if(filter_input(INPUT_GET, 'filmid') != NULL){
      $film_id = filter_input(INPUT_GET, 'filmid');
      $movie = get_a_movie_by_id($film_id);
      $actors = get_actors_by_film_id($film_id);
      $genres = get_genres_by_film_id($film_id);
    }
    include ("view.php");

  }

?>
