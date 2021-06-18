<?php


class Genre extends Model {

    private $genre = array();
    private $name;

    function __construct() {
        parent::__construct();
    }

    public function setGenre(array $genre) {
        $this->genre = $genre;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setGenreName($name) {
        $this->name = $name;
    }

    public function getGenreName() {
        return $this->name;
    }

    public function createGenre($id, $name) {
        $query = "INSERT INTO `genre` (genre_id, genre_name) VALUES ('$id','$name');";
        if ($this->db) {
            return $this->db->query($query);
        }
        return NULL;
    }

    public function updateGenre($id, $name) {
        $query = "UPDATE `genre` SET genre_name = `$name` WHERE genre_id = `$id`";
        if ($this->db) {
            return $this->db->query($query);
        }
        return NULL;
    }

    public function deleteGenre($id) {
        $query = "DELETE FROM `genre` WHERE genre_id = `$id`";
        if ($this->db) {
            return $this->db->query(($query));
        }
        return NULL;
    }

    public function deleteMovieGenre($movie_id, $genre_id) {
        $query = "DELETE FROM `movie_genre` WHERE genre_id = `$genre_id` and movie_id = `$movie_id`";
        if ($this->db) {
            return $this->db->query($query);
        }
    }

    public function insertMovieGenre($movie_id, $genre_id) {
        $query = "INSERT INTO `movie_genre` (movie_id,genre_id) VALUES ('$movie_id','$genre_id')";
        if ($this->db) {
            return $this->db->query(($query));
        }
        return NULL;
    }

    public function getMovieGenreByMovieID($id) {
        $sql = "SELECT genre_id, genre_name FROM `movie_genre` NATURAL JOIN `genre` WHERE movie_id = '$id'";
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    public function getAllGenre() {
        $sql = "SELECT genre_id, genre_name FROM `genre`";
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    public function getMovieInGenre($id) {
        $sql = "SELECT movie_id, title, poster FROM `movie_genre` NATURAL JOIN `movie` WHERE genre_id ='$id' LIMIT 10";
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }
}
