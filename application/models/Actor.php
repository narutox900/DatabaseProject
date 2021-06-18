<?php

class Actor extends Model {

    function __construct() {
        parent::__construct();
    }

    public function createActor($id, $name) {
        $query = "INSERT INTO `actor` (actor_id, actor_name) VALUES ('$id','$name');";
        if ($this->db) {
            return $this->db->query($query);
        }
        return NULL;
    }

    public function updateActor($id, $name) {
        $query = "UPDATE `actor` SET actor_name = `$name` WHERE actor_id = `$id`";
        if ($this->db) {
            return $this->db->query($query);
        }
        return NULL;
    }

    public function deleteActor($id) {
        $query = "DELETE FROM `actor` WHERE actor_id = `$id`";
        if ($this->db) {
            return $this->db->query(($query));
        }
    }

    public function insertMovieActor($movie_id, $actor_id) {
        $query = "INSERT INTO `movie_actor` (movie_id,actor_id) VALUES ('$movie_id','$actor_id')";
        if ($this->db) {
            return $this->db->query(($query));
        }
        return NULL;
    }

    public function getActorById($id) {
        $sql = "SELECT * FROM `actor` WHERE actor_id = '$id'";
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    public function getActorInMovieById($id) {
        $sql = "SELECT actor_id, actor_name FROM `movie_actor` NATURAL JOIN `actor` WHERE movie_id = '$id' LIMIT 10";
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    public function getMovieByActorId($id) {
        $sql = "SELECT movie_id, title, poster FROM `movie_actor` NATURAL JOIN `movie` WHERE actor_id ='$id'";
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    public function getActorAddMovie() {
        $sql = "SELECT * FROM `actor` LIMIT 20";
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    public function deleteMovieActor($movie_id, $actor_id) {
        $query = "DELETE FROM `movie_actor` WHERE actor_id = `$actor_id` and movie_id = `$movie_id`";
        if ($this->db) {
            return $this->db->query($query);
        }
    }
}
