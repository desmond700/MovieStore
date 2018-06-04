<?php

function add_movie($title,$run_time,$release_date,$rating,$price,$overview,$image_name,$actors,$actorsimg,$directors,$genres,$characters){
  global $db;

  $film_id = add_film($title,$run_time,$release_date,$rating,$price,$overview,$image_name);
  $directorArray = explode(",",$directors);
  $actorlength = count($actors);
  $directorlength = count($directorArray);

  //Insert Actors
  for($i = 0; $i < $actorlength; ++$i){
    $actorname = explode(" ",$actors[$i]);

    if(empty($actorname[0]) || empty($actorname[1]))continue;

    $actor_id = get_actor_id($actorname[0],$actorname[1]);
    if(is_numeric($actor_id)){
      add_actor_film($film_id,$actor_id);
    }else {
      $actor_id = add_actor($actorname[0],$actorname[1],$actorsimg[$i]);
      add_actor_film($film_id,$actor_id);
    }
    //Insert Characters
    $characte_id = get_character_id($characters[$i]);
    if(is_numeric($characte_id)){
      add_character_film($characte_id,$film_id,$actor_id);
    }else {
      $characte_id = add_character($characters[$i]);
      add_character_film($characte_id,$film_id,$actor_id);
    }
  }

  //Insert Genre/s
  foreach($genres as $genre){
    $genre_id = get_genre_id($genre);
    add_genre_film($genre_id,$film_id);
  }

  //Insert Director/s
  for($i = 0; $i < $directorlength; ++$i){
    $directorname = explode(" ",$directorArray[$i]);
    if(empty($directorname[0]) || empty($directorname[1]))continue;
    $director_id = get_director_id($directorname[0],$directorname[1]);

    if(is_numeric($director_id)){
      add_director_film($director_id,$film_id);
    }else {
      $director_id = add_director($directorname[0],$directorname[1]);
      add_director_film($director_id,$film_id);
    }
  }
}

//Insert
function add_actor($fname, $lname,$actorimg){
  global $db;
  $query = 'INSERT INTO actor(FirstName, LastName, img)
            VALUES(:fname,:lname,:actorimg)';
  $statement = $db->prepare($query);
  $statement->bindValue(":fname", $fname);
  $statement->bindValue(":lname", $lname);
  $statement->bindValue(":actorimg", $actorimg);
  $statement->execute();
  $id = $db->lastInsertId();
  $statement->closeCursor();
  return $id;
}

function add_director($fname, $lname){
  global $db;
  $query = 'INSERT INTO director(FirstName, LastName)
            VALUES(:fname,:lname)';
  $statement = $db->prepare($query);
  $statement->bindValue(":fname", $fname);
  $statement->bindValue(":lname", $lname);
  $statement->execute();
  $id = $db->lastInsertId();
  $statement->closeCursor();
  return $id;
}

function add_character($name){
  global $db;
  $query = 'INSERT INTO charactr(Name)
            VALUES(:name)';
  $statement = $db->prepare($query);
  $statement->bindValue(":name", $name);
  $statement->execute();
  $id = $db->lastInsertId();
  $statement->closeCursor();
  return $id;
}

function add_film($title,$run_time,$release_date,$rating,$price,$overview,$image_name){
  global $db;
  $query = 'INSERT INTO film(Title,Run_time,Release_Date,Rating,Price,Overview,Image_Name)
            VALUES(:title,:run_time,:release_date,:rating,:price,:overview,:image_name)';
  $statement = $db->prepare($query);
  $statement->bindValue(":title", $title);
  $statement->bindValue(":run_time", $run_time);
  $statement->bindValue(":release_date", $release_date);
  $statement->bindValue(":rating", $rating);
  $statement->bindValue(":price", $price);
  $statement->bindValue(":overview", $overview);
  $statement->bindValue(":image_name", $image_name);
  $statement->execute();
  $id = $db->lastInsertId();
  $statement->closeCursor();
  return $id;
}

function add_actor_film($film_id, $actor_id){
  global $db;
  $query = 'INSERT INTO actor_film(Film_id, Actor_id)
            VALUES(:film_id, :actor_id)';
  $statement = $db->prepare($query);
  $statement->bindValue(":film_id", $film_id);
  $statement->bindValue(":actor_id", $actor_id);
  $statement->execute();
  $statement->closeCursor();
}

function add_genre_film($genre_id,$film_id){
  global $db;
  $query = 'INSERT INTO genre_film(Genre_id,Film_id)
            VALUES(:genre_id, :film_id)';
  $statement = $db->prepare($query);
  $statement->bindValue(":genre_id", $genre_id);
  $statement->bindValue(":film_id", $film_id);
  $statement->execute();
  $statement->closeCursor();
}

function add_director_film($director_id,$film_id){
  global $db;
  $query = 'INSERT INTO director_film(Director_id,Film_id)
            VALUES(:director_id, :film_id)';
  $statement = $db->prepare($query);
  $statement->bindValue(":director_id", $director_id);
  $statement->bindValue(":film_id", $film_id);
  $statement->execute();
  $statement->closeCursor();
}

function add_character_film($character_id,$film_id,$actor_id){
  global $db;
  $query = 'INSERT INTO charactr_film(Character_id, Film_id, Actor_id)
            VALUES(:character_id, :film_id, :actor_id)';
  $statement = $db->prepare($query);
  $statement->bindValue(":character_id", $character_id);
  $statement->bindValue(":film_id", $film_id);
  $statement->bindValue(":actor_id", $actor_id);
  $statement->execute();
  $statement->closeCursor();
}

?>
