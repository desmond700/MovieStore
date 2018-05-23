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

  if($action == "List-movies"){
    
    include "list.php";

  }else if($action == "Add-movies"){

    include "add.php";

  }else if($action == "Edit-movies"){

    include "edit.php";

  }else if($action == "Movie-Details"){

    include "details.php";

  }else if($action == "Delete-movies"){

  }
?>

<?php include "view/footer.php" ?>
