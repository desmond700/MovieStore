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
    $movies = get_movies();
    include ("./list.php");

  }else if($action == "add_movie"){

    include ("./add.php");

  }else if($action == "edit_movie"){

    include ("edit.php");

  }else if($action == "movie_details"){

    include ("details.php");

  }else if($action == "delete_movie"){
    include ("details.php");
  }
?>
