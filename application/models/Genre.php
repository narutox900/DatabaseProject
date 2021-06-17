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
