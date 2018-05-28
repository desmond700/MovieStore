<?php

    //********************//
    //** Get all movies **//
    //********************//
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

    //**************************//
    //** Get a movie by title **//
    //**************************//
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

    //**************************//
    //** Get number of movies **//
    //**************************//
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

    //********************//
    //** Get all genres **//
    //********************//
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

    //***********************//
    //** Get film by genre **//
    //***********************//
    function get_by_genre($genre){
      global $db;
      $query = 'SELECT *
                FROM film
                INNER JOIN genre_film ON genre_film.Film_id = film.Film_id
                INNER JOIN genre ON genre.Genre_id = genre_film.Genre_id
                WHERE genre.Genre_id = :genre';
      $statement = $db->prepare($query);
      $statement->bindValue(":genre", $genre);
      $statement->execute();
      $genre = $statement->fetchAll();
      $statement->closeCursor();
      return $genre;
    }

    //***********************//
    //** Get film by title **//
    //***********************//
    function get_by_title($title){
      global $db;
      $query = 'SELECT *
                FROM film
                WHERE Title like ?';
      $statement = $db->prepare($query);
      $statement->bindValue(1, "%$title%",PDO::PARAM_STR);
      $statement->execute();
      $title = $statement->fetchAll();
      $statement->closeCursor();
      return $title;
    }

    //***************************************//
    //** Get actor id via stored procedure **//
    //***************************************//
    function get_actor_id($fname, $lname){
      global $db;
      $stmt = $db->prepare("CALL actorProc(:fname,:lname,@p2)");
      $stmt->bindParam(":fname", $fname, PDO::PARAM_STR);
      $stmt->bindParam(":lname", $lname, PDO::PARAM_STR);

      // call the stored procedure
      $stmt->execute();

      $row = $db->query("SELECT @p2 AS id")->fetch(PDO::FETCH_ASSOC);
      $id = $row["id"];
      return ($id != false) ? $id : NULL;
    }

    //***************************************//
    //** Get genre id via stored procedure **//
    //***************************************//
    function get_genre_id($name){
      global $db;
      $stmt = $db->prepare("CALL genreProc(:name,@p1)");
      $stmt->bindParam(":name", $name, PDO::PARAM_STR);

      // call the stored procedure
      $stmt->execute();

      $row = $db->query("SELECT @p1 AS id")->fetch(PDO::FETCH_ASSOC);
      $id = $row["id"];
      return ($id != false) ? $id : NULL;
    }

    //******************************************//
    //** Get director id via stored procedure **//
    //******************************************//
    function get_director_id($name){
      global $db;
      $stmt = $db->prepare("CALL genreProc(:name,@p1)");
      $stmt->bindParam(":name", $name, PDO::PARAM_STR);

      // call the stored procedure
      $stmt->execute();

      $row = $db->query("SELECT @p1 AS id")->fetch(PDO::FETCH_ASSOC);
      $id = $row["id"];
      return ($id != false) ? $id : NULL;
    }

    //*******************************************//
    //** Get character id via stored procedure **//
    //*******************************************//
    function get_character_id($name){
      global $db;
      $stmt = $db->prepare("CALL characterProc(:name,@p1)");
      $stmt->bindParam(":name", $name, PDO::PARAM_STR);
      // call the stored procedure
      $stmt->execute();
      $row = $db->query("SELECT @p1 AS id")->fetch(PDO::FETCH_ASSOC);
      $id = $row["id"];

      return ($id != false) ? $id : NULL;
    }

    function add_movie($title,$run_time,$release_date,$rating,$price,$overview,$image_name,$actors,$directors,$genres,$characters){
      global $db;

      $film_id = add_film($title,$run_time,$release_date,$rating,$price,$overview,$image_name);
      $actorArray = explode(",",$actors);
      $genreArray = array_filter(explode(",",$genres));
      $directorArray = explode(",",$directors);
      $characterArray = array_filter(explode(",",$characters));

      //Insert Actors
      foreach($actorArray as $actor){
        $actornames = explode(" ",$actor);
        $actor_id = get_actor_id($actornames[0],$actornames[1]);
        if($actor_id != NULL){
          add_actor_film($film_id,$actor_id);
        }else {
          $actor_id = add_actor($actornames[0],$actornames[1]);
          add_actor_film($film_id,$actor_id);
        }
        //Insert Characters
        foreach($characterArray as $character){
          $characte_id = get_character_id($character);
          if($characte_id != NULL){
            add_character_film($characte_id,$actor_id,$film_id);
          }else {
            $characte_id = add_character($character);
            add_character_film($characte_id,$actor_id,$film_id);
          }
        }
      }

      //Insert Genre/s
      foreach($genreArray as $genre){
        $genre_id = get_genre_id($genre);
        add_genre_film($genre_id,$film_id);
      }

      //Insert Director/s
      foreach($directorArray as $director){
        $directornames = explode(" ",$director);
        $director_id = get_director_id($directornames[0],$directornames[1]);

        if($director_id != NULL){
          add_director_film($director_id,$film_id);
        }else {
          $director_id = add_director($directornames[0],$directornames[1]);
          add_director_film($director_id,$film_id);
        }
      }
    }

    //Insert
    function add_actor($fname, $lname){
      global $db;
      $query = 'INSERT INTO actor(FirstName, LastName)
                VALUES(:fname,:lname)';
      $statement = $db->prepare($query);
      $statement->bindValue(":fname", $fname);
      $statement->bindValue(":lname", $lname);
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

    function add_character_film($character_id,$actor_id,$film_id){
      global $db;
      $query = 'INSERT INTO charactr_film(Character_id, Film_id, Actor_id)
                VALUES(:character_id, :actor_id, :film_id)';
      $statement = $db->prepare($query);
      $statement->bindValue(":character_id", $character_id);
      $statement->bindValue(":actor_id", $actor_id);
      $statement->bindValue(":film_id", $film_id);
      $statement->execute();
      $statement->closeCursor();
    }


?>
