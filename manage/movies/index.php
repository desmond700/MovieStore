<?php
  require "model/database.php";
  require "model/categorydb.php";
  require "model/moviedb.php";


  $action = filter_input(INPUT_POST, "action");
  if($action == NULL){
    $action = filter_input(INPUT_GET, "action");
    if($action == NULL){
      $action = "Home";
    }
  }

  if($action == "Home"){
    include "view/home.php";
  }else if($action == ""){

  }else if($action == ""){

  }else if($action == ""){

  }else if($action == ""){

  }
?>

<?php include "view/footer.php" ?>
