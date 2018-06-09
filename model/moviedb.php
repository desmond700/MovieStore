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
                INNER JOIN director_film ON director_film.Film_id = film.Film_id
                INNER JOIN director ON director.Director_id = director_film.Director_id
                WHERE film.Film_id = :id';
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
      $genres = $statement->fetchAll();
      $statement->closeCursor();
      return $genres;
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

    function add_favourite($customer_id,$film_id){
      global $db;
      $query = 'INSERT INTO favourites(Customer_id,Film_id)
                VALUES(:customer_id, :film_id)';
      $statement = $db->prepare($query);
      $statement->bindValue(":customer_id", $customer_id);
      $statement->bindValue(":film_id", $film_id);
      $statement->execute();
      $statement->closeCursor();
      get_favourite($customer_id);
    }

    function get_favourite($customer_id){
      global $db;
      $query = 'SELECT *
                FROM favourites
                INNER JOIN customer ON customer.Customer_id = favourites.Customer_id
                INNER JOIN film ON film.Film_id = favourites.Film_id
                WHERE customer.Customer_id = :customer_id';
      try{
          $statement = $db->prepare($query);
          $statement->bindValue(":customer_id", $customer_id);
          $statement->execute();
          $favourites = $statement->fetchAll();
          foreach ($favourites as $key => $value) {
            $_SESSION["favourite"][$value["Film_id"]]["Favourite_id"] = $value["Favourites_id"];
            $_SESSION["favourite"][$value["Film_id"]]["Title"] = $value["Title"];
            $_SESSION["favourite"][$value["Film_id"]]["Runtime"] = $value["Run_time"];
            $_SESSION["favourite"][$value["Film_id"]]["ReleaseDate"] = $value["Release_Date"];
            $_SESSION["favourite"][$value["Film_id"]]["Rating"] = $value["Rating"];
            $_SESSION["favourite"][$value["Film_id"]]["poster"] = $value["Image_Name"];
          }
          $statement->closeCursor();
        }catch(PDOException $e){

        }
    }

    function delete_favourite($favourite_id){
      global $db;
      $query = 'DELETE FROM `favourites` WHERE Favourites_id = :favourite_id';
      $statement = $db->prepare($query);
      $statement->bindValue(":favourite_id", $favourite_id);
      $statement->execute();
      $statement->closeCursor();
      // remove from session
      $key = array_search($favourite_id,$_SESSION["favourite"]);
      if($key !== false){
        unset($_SESSION["favourite"][$key]);
      }
    }

    function delete_film($film_id){
      global $db;
      $query = 'DELETE FROM `film` WHERE Film_id = :film_id';
      $statement = $db->prepare($query);
      $statement->bindValue(":film_id", $film_id);
      $statement->execute();
      $statement->closeCursor();
    }


?>
