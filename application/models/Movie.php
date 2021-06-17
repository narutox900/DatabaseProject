<?php

/**
 * 
 */
class Movie extends Model {
    private $movie_id;
    private $title;
    private $language;
    private $year;
    private $rating;
    private $isAdult;
    private $description;
    private $poster;
    private $genre = array();

    function __construct() {
        parent::__construct();
    }

    public function setMovieId($movie_id) {
        $this->movie_id = $movie_id;
    }

    public function getMovieId() {
        return $this->movie_id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setLanguage($language) {
        $this->language = $language;
    }

    public function getLanguage() {
        return $this->language;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function getYear() {
        return $this->year;
    }

    public function setRating($rating) {
        $this->rating = $rating;
    }

    public function getRating() {
        return $this->rating;
    }

    public function setLength($length) {
        $this->length = $length;
    }

    public function getLength() {
        return $this->length;
    }

    public function setIsAdult($isAdult) {
        $this->isAdult = $isAdult;
    }

    public function getIsAdult() {
        return $this->isAdult;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setPublisher($publisher) {
        $this->publisher = $publisher;
    }

    public function getPublisher() {
        return $this->publisher;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setPoster($poster) {
        $this->poster = $poster;
    }

    public function getPoster() {
        return $this->poster;
    }

    function getAllMovie() {
        $sql = "SELECT * FROM `movie` order by year desc LIMIT 50";
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    function getAllLanguage() {
        $sql = "SELECT DISTINCT language from movie";
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    public function getMovieById($id) {
        $sql = "SELECT * FROM `movie` WHERE movie_id = '$id' ";
        // echo $sql;
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    public function getMovieByName($name) {
        $sql = "SELECT * FROM `movie` WHERE title LIKE `%$name$` LIMIT 10";
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    public function getMovieFromSearch($title, $yearFrom, $yearEnd, $ratingFrom, $ratingEnd, $genres, $isAdult, $language, $plot, $actor, $director, $runtimeFrom, $runtimeEnd, $display, $order) {
        if ($yearEnd != 0 || $yearFrom != 0) {
            if ($yearEnd < $yearFrom) {
                $tmp = $yearEnd;
                $yearEnd = $yearFrom;
                $yearFrom = $tmp;
            }
            $year = true;
        } else {
            $year = false;
        }
        if (($ratingEnd != 0 || $ratingFrom != 0)) {
            if ($ratingEnd < $ratingFrom) {
                $tmp = $ratingFrom;
                $ratingFrom = $ratingEnd;
                $ratingEnd = $tmp;
            }
            $rating = true;
        } else {
            $rating = false;
        }
        if (($runtimeEnd != 0 || $runtimeFrom != 0)) {
            if ($runtimeEnd < $runtimeFrom) {
                $tmp = $runtimeFrom;
                $runtimeFrom = $runtimeEnd;
                $runtimeEnd = $tmp;
            }
            $runtime = true;
        } else {
            $runtime = false;
        }

        if ($actor) {
            $actor_query = " NATURAL JOIN `movie_actor` NATURAL JOIN `actor`";
            $actor_condition = " actor_name LIKE '%$actor%'";
        }

        if ($director) {
            $director_query = " NATURAL JOIN `movie_director` NATURAL JOIN `director`";
            $director_condition = " director_name LIKE '%$director%'";
        }


        if ($genres) {
            $genres_query = " NATURAL JOIN `movie_genre`";
            $genres_condition = " genre_id IN (";
            $i = 0;
            foreach ($genres as $genre) {
                $i++;
                if ($i != 1) {
                    $genres_condition .= ",";
                }
                $genres_condition .= " '$genre'";
            }
            $genres_condition .= ")";
        }
        $display_query = "";
        switch ($display) {
            case 0:
                $display_query = " LIMIT 50";
                break;
            case 1:
                $display_query = " LIMIT 100";
                break;
            case 2:
                $display_query = " LIMIT 150";
                break;
            default:
                break;
        }

        $order_query = "";
        switch ($order) {
            case 0:
                $order_query = " ORDER BY rating";
                break;
            case 1:
                $order_query = " ORDER BY rating DESC";
                break;
            case 2:
                $order_query = " ORDER BY title";
                break;
            case 3:
                $order_query = " ORDER BY title DESC";
                break;
            case 4:
                $order_query = " ORDER BY year";
                break;
            case 5:
                $order_query = " ORDER BY year DESC";
                break;
            case 6:
                $order_query = " ORDER BY length";
                break;
            case 7:
                $order_query = " ORDER BY length DESC";
                break;
            default:
                break;
        }


        $query = " SELECT movie_id, title, year, rating, length FROM `movie`";
        $and = " AND";
        $flag = false;
        if ($actor) {
            $query .= $actor_query;
        }
        if ($director) {
            $query .= $director_query;
        }
        if ($genres) {
            $query .= $genres_query;
        }
        $query .= " WHERE";
        if ($title) {
            if ($flag) {
                $query .= $and;
            }
            $query .= " title LIKE '%$title$'";
            $flag = true;
        }
        if ($year) {
            if ($flag) {
                $query .= $and;
            }
            $query .= " year BETWEEN $yearFrom AND $yearEnd";
            $flag = true;
        }
        if ($rating) {
            if ($flag) {
                $query .= $and;
            }
            $query .= " rating BETWEEN $ratingFrom AND $ratingEnd";
            $flag = true;
        }
        if ($runtime) {
            if ($flag) {
                $query .= $and;
            }
            $query .= " length BETWEEN $runtimeFrom AND $runtimeEnd";
            $flag = true;
        }
        if (!$isAdult) {
            if ($flag) {
                $query .= $and;
            }
            $query .= " isAdult = false";
            $flag = true;
        }
        if ($language) {
            if ($flag) {
                $query .= $and;
            }
            $query .= " language = '$language'";
            $flag = true;
        }
        if ($plot) {
            if ($flag) {
                $query .= $and;
            }
            $query .= " description LIKE '%$plot%'";
            $flag = true;
        }
        if ($actor) {
            if ($flag) {
                $query .= $and;
            }
            $query .= $actor_condition;
            $flag = true;
        }
        if ($director) {
            if ($flag) {
                $query .= $and;
            }
            $query .= $director_condition;
            $flag = true;
        }
        if ($genres) {
            if ($flag) {
                $query .= $and;
            }
            $query .= $director_condition;
            $flag = true;
        }
        $query .= $order_query;
        $query .= $display_query;
        if ($this->db) {
            return $this->db->query($query);
        }
        return NULL;
    }

    public function createMovie($movie_id, $title, $language, $year, $rating, $length, $isAdult, $description, $poster) {
        $query = "INSERT INTO `movie` (movie_id, title, language, year, rating, length, isAdult, description, poster) VALUES ('$movie_id', '$title', '$language', $year, $rating, $length, $isAdult, '$description', '$poster');";
        if ($this->db) {
            return $this->db->query($query);
        }
        return NULL;
    }

    public function updateMovie($movie_id, $title, $language, $year, $rating, $length, $isAdult, $description, $poster) {
        $query = "UPDATE `movie` SET title = `$title`, language = '$language', year = $year, rating = $rating, length = $length, isAdult = $isAdult, description = '$description', poster = '$poster' WHERE movie_id = '$movie_id' ";
        if ($this->db) {
            return $this->db->query($query);
        }
        return NULL;
    }

    public function deleteMovie($id) {
        $query = "DELETE FROM `movie` WHERE movie_id = `$id`";
        if ($this->db) {
            return $this->db->query(($query));
        }
    }

    function issetMovieId($movie_id) {
        $sql = "SELECT COUNT(*) as count FROM movie WHERE movie_id = '".$movie_id ."'";
        if ($this->db) {
            $value = $this->db->query($sql);
            if(isset($value[0][""]["count"])){
                return $value[0][""]["count"];
            }else{
                return $value[0]["Movie"]["count"];
            }
        }
        return NULL;
    }
    

    function getBookByFilter($filter) {
        $sql = "SELECT * FROM `book`";
        if (isset($filter)) {
            if (count($filter["category"]) > 0 || count($filter["publisher"]) > 0 || count($filter["author"]) > 0 || $filter["rating"] > 0 || $filter["suggestion"] != "")
                $sql = $sql . " WHERE ";
            $and = 0;
            if (count($filter["category"]) > 0) {                                 //Category filter
                $tmp_sql = "(book_id IN (SELECT book_id FROM bookcategory WHERE category_id IN (";
                $i = 0;
                foreach ($filter["category"] as $value) {
                    $tmp_sql = $tmp_sql . "'" . $value . "'";
                    if (++$i != count($filter["category"])) {
                        $tmp_sql = $tmp_sql . ",";
                    }
                }
                $tmp_sql = $tmp_sql . "))) ";
                $sql = $sql . $tmp_sql;
                $and = 1;
            }

            if (count($filter["publisher"]) > 0) {                             //Publisher filter
                if ($and == 1)
                    $tmp_sql = "AND (publisher IN (";
                else if ($and == 0)
                    $tmp_sql = " (publisher IN (";
                $i = 0;
                foreach ($filter["publisher"] as $value) {
                    $tmp_sql = $tmp_sql . "'" . $value . "'";
                    if (++$i != count($filter["publisher"])) {
                        $tmp_sql = $tmp_sql . ",";
                    }
                }
                $tmp_sql = $tmp_sql . ")) ";
                $sql = $sql . $tmp_sql;
                $and = 1;
            }

            if (count($filter["author"]) > 0) {                                 //Author filter
                if ($and == 1)
                    $tmp_sql = "AND (author IN (";
                else if ($and == 0)
                    $tmp_sql = " (author IN (";
                $i = 0;
                foreach ($filter["author"] as $value) {
                    $tmp_sql = $tmp_sql . "'" . $value . "'";
                    if (++$i != count($filter["author"])) {
                        $tmp_sql = $tmp_sql . ",";
                    }
                }
                $tmp_sql = $tmp_sql . ")) ";
                $sql = $sql . $tmp_sql;
                $and = 1;
            }

            if ($filter["rating"] != 0) {                                        //Rating filter
                if ($and == 1)
                    $sql = $sql . "AND rating >= " . $filter["rating"];
                else if ($and == 0)
                    $sql = $sql . " rating >= " . $filter["rating"];
                $and = 1;
            }

            if ($filter["suggestion"] != "") {                                        //Rating filter
                if ($and == 1)
                    $sql = $sql . "AND title like '%" . $filter["suggestion"] . "%' ";
                else if ($and == 0)
                    $sql = $sql . "title like '%" . $filter["suggestion"] . "%' ";
            }

            if ($filter["order"] == "old") {
                //Default
            } elseif ($filter["order"] == "new") {
                $sql = $sql . " ORDER BY book_id DESC";
            } elseif ($filter["order"] == "name") {
                $sql = $sql . " ORDER BY title";
            }
            if ($this->db) {
                return $this->db->query($sql);
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }
    }
}
