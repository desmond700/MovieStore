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

    function get_a_movie($title){
      global $db;
      $query = 'SELECT Film_id
                FROM film
                WHERE Title = :title';
      $statement = $db->prepare($query);
      $statement->bindValue(":title", $title);
      $statement->execute();
      $movie = $statement->fetch();
      $film_id = $movie["Film_id"];
      $statement->closeCursor();
      return $film_id;
    }

    function get_movies_count(){
      global $db;
      $query = 'SELECT *
                FROM film';
      $statement = $db->prepare($query);
      $statement->execute();
      $count = $statement->rowCount();
      $statement->closeCursor();
      return $count;
    }

    function get_genres(){
      global $db;
      $query = 'SELECT *
                FROM genre';
      $statement = $db->prepare($query);
      $statement->execute();
      $genre = $statement->fetchAll();
      $statement->closeCursor();
      return $genre;
    }

    function title_search($title){
      global $db;
      $query = 'SELECT Title
                FROM film
                WHERE Title like :title';
      $statement = $db->prepare($query);
      $statement->bindValue(":title", $title);
      $statement->execute();
      $title = $statement->fetchAll();
      $statement->closeCursor();
      return $title;
    }
?>
