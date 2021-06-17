<?php
class Director extends Model {

    function __construct() {
        parent::__construct();
    }

    public function createDirector($id, $name) {
        $query = "INSERT INTO `director` (director_id, director_name) VALUES ('$id','$name');";
        if ($this->db) {
            return $this->db->query($query);
        }
        return NULL;
    }

    public function updateDirector($id, $name) {
        $query = "UPDATE `director` SET director_name = `$name` WHERE director_id = `$id`";
        if ($this->db) {
            return $this->db->query($query);
        }
        return NULL;
    }

    public function deleteDirector($id) {
        $query = "DELETE FROM `director` WHERE director_id = `$id`";
        if ($this->db) {
            return $this->db->query(($query));
        }
    }

    public function insertMovieDirector($movie_id, $director_id) {
        $query = "INSERT INTO `movie_director` (movie_id,director_id) VALUES ('$movie_id','$director_id')";
        if ($this->db) {
            return $this->db->query(($query));
        }
        return NULL;
    }

    public function getDirectorById($id) {
        $sql = "SELECT * FROM `director` WHERE director_id = '$id'";
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }



    public function getDirectorInMovieById($id) {
        $sql = "SELECT director_id, director_name FROM `movie_director` NATURAL JOIN `director` WHERE movie_id = '$id'";
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }


    public function getMovieByDirectorId($id) {
        $sql = "SELECT movie_id, title, poster FROM `movie_director` NATURAL JOIN `movie` WHERE director_id ='$id'";
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    public function getDirectorAddMovie() {
        $sql = "SELECT * FROM `director` LIMIT 20";
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }
}
