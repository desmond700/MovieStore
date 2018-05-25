<?php
    function get_movies(){
      global $db;
      $query = "SELECT *
                FROM film";
      $statement = $db->prepare($query);
      $statement->execute();
      $movies = $statement->fetchAll();
      $statement->closeCursor();
      return $movies;
    }

?>
