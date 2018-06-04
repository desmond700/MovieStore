<?php

  function update_film($film_id,$title,$run_time,$release_date,$rating,$price,$overview,$actor_id,$actors,$character_id,$characters,$director_id,$directors){

    film($film_id,$title,$run_time,$release_date,$rating,$price,$overview);
    update_actor($actor_id,$firstname,$lastname);
    update_character($character_id,$name);
    update_director($director_id,$firstname,$lastname);
  }

  function film($film_id,$title,$run_time,$release_date,$rating,$price,$overview){
    global $db;
    $query = "UPDATE film
              SET Title = :title ,Run_time = :run_time ,Release_Date = :release_date ,Rating = :rating ,Price = :price , Overview = :overview
              WHERE Film_id = :film_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":title", $title);
    $statement->bindValue(":run_time", $run_time);
    $statement->bindValue(":release_date", $release_date);
    $statement->bindValue(":rating", $rating);
    $statement->bindValue(":price", $price);
    $statement->bindValue(":overview", $overview);
    $statement->execute();
    $statement->closeCursor();
  }

  function update_actor($actor_id,$firstname,$lastname){
    global $db;
    $query = "UPDATE actor
              SET FirstName = :firstname, LastName = :lastname
              WHERE Actor_id = :actor_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":firstname", $firstname);
    $statement->bindValue(":lastname", $lastname);
    $statement->bindValue(":actor_id", $actor_id);
    $statement->execute();
    $statement->closeCursor();
  }

  function update_character($character_id,$name){
    global $db;
    $query = "UPDATE charactr
              SET Name = :name
              WHERE Character_id = :character_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":name", $name);
    $statement->bindValue(":character_id", $character_id);
    $statement->execute();
    $statement->closeCursor();
  }

  function update_director($director_id,$firstname,$lastname){
    global $db;
    $query = "UPDATE director
              SET FirstName = :firstname, LastName = :lastname
              WHERE Director_id = :director_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":firstname", $firstname);
    $statement->bindValue(":lastname", $lastname);
    $statement->bindValue(":director_id", $director_id);
    $statement->execute();
    $statement->closeCursor();
  }

?>
