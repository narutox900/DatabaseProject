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

    public function getAllCategory() {
        $sql = "SELECT * FROM category";
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }
    public function getCategoryById($id) {
        $sql = "SELECT * FROM category WHERE category_id =" . $id;
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    public function editCategory($id) {

        $sql = "UPDATE `category` SET `category_name`='" . $this->name . "' WHERE category_id =" . $id;
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    public function addCategory() {
        $sql = "INSERT INTO `category`(`category_id`, `category_name`) VALUES (NULL, '" . $this->name . "')";
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    public function deleteCategory($id) {

        $sql = "DELETE FROM `bookcategory` WHERE `category_id`=" . $id;
        $this->db->query($sql);
        $sql = "DELETE FROM `category` WHERE category_id =" . $id;
        if ($this->db) {
            return $this->db->query($sql);
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

    public function getAllGenre($id) {
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
