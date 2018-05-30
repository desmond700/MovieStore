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
    //** Get a movie by id **//
    //**************************//
    function get_a_movie_by_id($id){
      global $db;
      $query = 'SELECT *
                FROM film
                WHERE Film_id = :id';
      $statement = $db->prepare($query);
      $statement->bindValue(":id", $id);
      $statement->execute();
      $movie = $statement->fetch();
      $statement->closeCursor();
      return $movie;
    }

    //**************************//
    //** Get actors by film_id **//
    //**************************//
    function get_actors_by_film_id($id){
      global $db;
      $query = 'SELECT *
                FROM actor
                INNER JOIN actor_film ON actor_film.Actor_id = actor.Actor_id
                INNER JOIN film ON film.Film_id = actor_film.Film_id
                WHERE film.Film_id = :id';
      $statement = $db->prepare($query);
      $statement->bindValue(":id", $id);
      $statement->execute();
      $movie = $statement->fetchAll();
      $statement->closeCursor();
      return $movie;
    }

    function get_actors_names_by_film_id($id){
      global $db;
      $query = 'SELECT FirstName, LastName
                FROM actor
                INNER JOIN actor_film ON actor_film.Actor_id = actor.Actor_id
                INNER JOIN film ON film.Film_id = actor_film.Film_id
                WHERE film.Film_id = :id';
      $statement = $db->prepare($query);
      $statement->bindValue(":id", $id);
      $statement->execute();
      $actors = $statement->fetchAll();
      $statement->closeCursor();
      return $actors;
    }

    //***************************//
    //** Get genres by film_id **//
    //***************************//
    function get_genres_by_film_id($id){
      global $db;
      $query = 'SELECT *
                FROM genre
                INNER JOIN genre_film ON genre_film.Genre_id = genre.Genre_id
                INNER JOIN film ON film.Film_id = genre_film.Film_id
                WHERE film.Film_id = :id';
      $statement = $db->prepare($query);
      $statement->bindValue(":id", $id);
      $statement->execute();
      $genre = $statement->fetchAll();
      $names = "";
      foreach ($genre as $key => $value) {
        $names .= $value["Genre"].", ";
      }
      $statement->closeCursor();
      return $names;
    }

    //***************************//
    //** Get characters by film_id **//
    //***************************//
    function get_characters_by_film_id($id){
      global $db;
      $query = 'SELECT *
                FROM charactr
                INNER JOIN charactr_film ON charactr_film.Character_id = charactr.Character_id
                INNER JOIN film ON film.Film_id = charactr_film.Film_id
                WHERE film.Film_id = :id';
      $statement = $db->prepare($query);
      $statement->bindValue(":id", $id);
      $statement->execute();
      $genre = $statement->fetchAll();
      $statement->closeCursor();
      return $genre;
    }

    //************************************//
    //** Get column names of film table **//
    //************************************//
    function get_film_column_names(){
      global $db;

      $statement = $db->prepare("SHOW COLUMNS FROM film");
      try {
            if($statement->execute()){
                $raw_column_data = $statement->fetchAll();

                foreach($raw_column_data as $outer_key => $array){
                    foreach($array as $inner_key => $value){

                        if ($inner_key === 'Field'){
                                if (!(int)$inner_key){
                                    $column_names[] = $value;
                                }
                            }
                    }
                }
            }
            return $column_names;
        } catch (Exception $e){
                return $e->getMessage(); //return exception
        }
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
      $statement = $db->prepare("CALL actorProc(:fname,:lname,@p2)");
      $statement->bindParam(":fname", $fname, PDO::PARAM_STR);
      $statement->bindParam(":lname", $lname, PDO::PARAM_STR);

      // call the stored procedure
      $statement->execute();

      $row = $db->query("SELECT @p2 AS id")->fetch(PDO::FETCH_ASSOC);
      $id = $row["id"];
      return $id;
    }

    //***************************************//
    //** Get genre id via stored procedure **//
    //***************************************//
    function get_genre_id($name){
      global $db;
      $statement = $db->prepare("CALL genreProc(:name, @p1)");
      $statement->bindParam(":name", $name, PDO::PARAM_STR);

      // call the stored procedure
      $statement->execute();

      $row = $db->query("SELECT @p1 AS id")->fetch(PDO::FETCH_ASSOC);
      $id = $row["id"];
      return $id;
    }

    //******************************************//
    //** Get director id via stored procedure **//
    //******************************************//
    function get_director_id($fname,$lname){
      global $db;
      $stmt = $db->prepare("CALL directorProc(:fname,:lname, @p2)");
      $stmt->bindParam(":fname", $fname, PDO::PARAM_STR);
      $stmt->bindParam(":lname", $lname, PDO::PARAM_STR);
      // call the stored procedure
      $stmt->execute();

      $row = $db->query("SELECT @p2 AS id")->fetch(PDO::FETCH_ASSOC);
      $id = $row["id"];
      return $id;
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

      return $id;
    }

    function add_movie($title,$run_time,$release_date,$rating,$price,$overview,$image_name,$actors,$directors,$genres,$characters){
      global $db;

      $film_id = add_film($title,$run_time,$release_date,$rating,$price,$overview,$image_name);
      $genreArray = explode(",",$genres);
      $directorArray = explode(",",$directors);
      $actorlength = count($actors);
      //Insert Actors
      for($i = 0; $i < $actorlength; ++$i){
        $actornames = explode(" ",$actors[$i]);

        if(empty($actornames[0]) || empty($actornames[1]))continue;

        $actor_id = get_actor_id($actornames[0],$actornames[1]);
        if(is_numeric($actor_id)){
          add_actor_film($film_id,$actor_id);
        }else {
          $actor_id = add_actor($actornames[0],$actornames[1]);
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
      foreach($genreArray as $genre){
        $genre_id = get_genre_id($genre);
        add_genre_film($genre_id,$film_id);
      }

      //Insert Director/s
      foreach($directorArray as $director){
        $directornames = explode(" ",$director);
        if(empty($directornames[0]) || empty($directornames[1]))continue;
        $director_id = get_director_id($directornames[0],$directornames[1]);

        if(is_numeric($director_id)){
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


    // Update information
    

?>
