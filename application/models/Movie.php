<?php  
	/**
	 * 
	 */
	class Movie extends Model
	{
        private $movie_id;
        private $title;
        private $language;
        private $year;
        private $rating;
        private $isAdult;
        private $description;
        private $poster;
        private $genre = array();

		function __construct()
		{
			parent::__construct();
		}

        public function setMovieId($movie_id){
		    $this->movie_id = $movie_id;
        }

        public function getMovieId(){
            return $this->movie_id;
        }

		public function setTitle($title){
		    $this->title = $title;
        }

        public function getTitle(){
            return $this->title;
        }

        public function setLanguage($language){
            $this->language = $language;
        }

        public function getLanguage(){
            return $this->language;
        }

        public function setYear($year){
            $this->year = $year;
        }

        public function getYear(){
            return $this->year;
        }

        public function setRating($rating){
            $this->rating = $rating;
        }

        public function getRating(){
            return $this->rating;
        }

        public function setLength($length){
            $this->length = $length;
        }

        public function getLength(){
            return $this->length;
        }

        public function setIsAdult($isAdult){
            $this->isAdult = $isAdult;
        }

        public function getIsAdult(){
            return $this->isAdult;
        }

        public function setDescription($description){
            $this->description = $description;
        }

        public function getDescription(){
            return $this->description;
        }

        public function setPublisher($publisher){
            $this->publisher = $publisher;
        }

        public function getPublisher(){
            return $this->publisher;
        }

        public function setGenre($genre){
            $this->genre = $genre;
        }

        public function getGenre(){
            return $this->genre;
        }

        public function setPoster($poster){
		    $this->poster = $poster;
        }

        public function getPoster(){
            return $this->poster;
        }

		function getAllBook() {
			$sql = "SELECT * FROM `book`";
			if ($this->db) {
				return $this->db->query($sql);
			}
			return NULL;
		}

        function getMovieById($id) {
            $sql = "SELECT * FROM `movie` WHERE movie_id = ". $id ." ";
            // echo $sql;
            if ($this->db) {
                return $this->db->query($sql);
            }
            return NULL;
        }

		function getBookByName($bookName) {
            $sql = "SELECT * FROM `book` WHERE title LIKE '%". $bookName ."%' ";
            // echo $sql;
            if ($this->db) {
                return $this->db->query($sql);
            }
            return NULL;
        }

        function getBookName($name) {
            $sql = "SELECT * FROM `book` WHERE title LIKE '%". $name ."%' ";
            // echo $sql;
            if ($this->db) {
                return  $this->db->query($sql);
            }
            return NULL;
        }

        function getLatestInsertedBook(){
            $sql = "SELECT book_id FROM book ORDER BY book_id DESC LIMIT 1 ";
            if ($this->db) {
                return $this->db->query($sql);
            }
            return NULL;
        }

		function addBookToDb() {
		    $sql = "INSERT INTO `book` 
                    (`book_id`, `title`, `author`, `description`, `rating`, `number_of_review`, `publisher`, `thumbnail_address`, `bookPDF`) 
                    VALUES 
                    (NULL, '" . $this->title . "','" . $this->author . "','" . $this->description . "', '0', '0', '" . $this->publisher . "', '". $this->thumbnail . "', '".$this->PDF."');";
            if ($this->db) {
                if($this->db->query($sql)){
                    $book_id = $this->getLatestInsertedBook();
                    foreach($this->category as $category_value){
                        $sql = "INSERT INTO `bookcategory` (`book_id`, `category_id`) VALUES ('".$book_id[0]['Book']['book_id']."', '".$category_value."')";
                        $this->db->query($sql);
                    }
                };
            }
            return NULL;
        }

        function updateBook($id){
		    $sql = "UPDATE `book` 
                    SET `title`='".$this->title."',
                        `author`='".$this->author."',
                        `description`='".$this->description."',
                        `publisher`='".$this->publisher."',
                        `thumbnail_address`='".$this->thumbnail."',
                        `bookPDF`='".$this->PDF."' 
                    WHERE `book_id`=".$id;
            if ($this->db) {
                return $this->db->query($sql);
            }
            return NULL;
        }

        function updateCategory($book_id)
        {
            echo $book_id;
            $sql = "DELETE FROM `bookcategory` WHERE `book_id`=".$book_id;
            $this->db->query($sql);
            foreach($this->category as $category_key => $value){
                print("<pre>".print_r($category_key,true)."</pre>");
                $sql = "INSERT INTO `bookcategory` (`book_id`, `category_id`) VALUES ('".$book_id."', '".$value."')";
                $this->db->query($sql);
            }
            return;
        }

        function deleteBook($id) {
		    $sqlDeleteBookCategory = "DELETE FROM `bookcategory` WHERE book_id=".$id;
		    $sql = "DELETE FROM `book` WHERE book_id = ".$id;
            if ($this->db) {
                $this->db->query($sqlDeleteBookCategory);
                return $this->db->query($sql);
            }
            return NULL;
        }

        function getAllPublisher(){
            $sql = "SELECT DISTINCT publisher FROM book";
            if ($this->db) {
                return $this->db->query($sql);
            }
            return NULL;
        }

        function getAllAuthor(){
            $sql = "SELECT DISTINCT author FROM book";
            if ($this->db) {
                return $this->db->query($sql);
            }
            return NULL;
        }
        
    function getBookByFilter($filter)
    {
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
                    $sql = $sql . "AND title like '%". $filter["suggestion"] ."%' ";
                else if ($and == 0)
                     $sql = $sql . "title like '%". $filter["suggestion"] ."%' ";
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
            }else{
                return NULL;
            }
        } else {
            return NULL;
        }
    }
}
