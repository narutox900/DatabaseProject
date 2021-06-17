<?php  
	/**
	 * 
	 */
	class adminController extends Controller
	{
        /**
         * @var mixed
         */
        private $userModel;
        private $movieModel;
        private $directorModel;
        private $genreModel;
        private $actorModel;

        public function __construct()
		{
		    $this->userModel = $this->model('User');
            $this->genreModel =  $this->model('Genre');
            $this->actorModel = $this->model('Actor');
            $this->directorModel = $this->model('Director');
            $this->movieModel = $this->model('Movie');
		}

		public function roleValidation($view, $data){
            // Admin role id is 1
            if ($_SESSION['role'] && $_SESSION['role'] == 1)
            {
                $this->view($view, $data);
                return 1;
            }
            return 0;
        }

        public function redirectToMain(){
            $directory = getAbsolutePath();
            header("Location: http://$_SERVER[HTTP_HOST]$directory");
        }

        public function redirectToAdminListMovie(){
            $directory = getAbsolutePath();
            header("Location: http://$_SERVER[HTTP_HOST]$directory/admin/listMovie");
        }

        public function redirectToAdminListCategory(){
            $directory = getAbsolutePath();
            header("Location: http://$_SERVER[HTTP_HOST]$directory/admin/crudCategory");
        }

        public function redirectToAdmin(){
            $directory = getAbsolutePath();
            header("Location: http://$_SERVER[HTTP_HOST]$directory/admin");
        }

        public function redirectToAdminGuestList(){
            $directory = getAbsolutePath();
            header("Location: http://$_SERVER[HTTP_HOST]$directory/admin/guestList");
        }

		public function index()
		{
            if (!$this->roleValidation('admin', NULL)){
                $this->redirectToMain();
            }
		}

		public function listMovie()
        {
            $movie = $this->movieModel->getAllMovie();
            if (!$this->roleValidation('adminListMovie', $movie)){
                $this->redirectToMain();
            }
        }

		public function addMovie()
		{
            $data = array();
            $genre = $this->genreModel->getAllGenre();
            $actor = $this->actorModel->getActorAddMovie();
            $director = $this->directorModel->getDirectorAddMovie();
            $movie = $this->movieModel->getAllLanguage();
            $tmp = rand(0,1000000000);
            while($this->movieModel->issetMovieId($tmp)){
                $tmp = rand(0,1000000000);
            }
            array_push($data,$genre);
            array_push($data,$actor);
            array_push($data,$director);
            array_push($data,$movie);
            array_push($data,$tmp);
            if (!$this->roleValidation('adminAddMovie', $data)){
                $this->redirectToMain();
            }
		}

		public function addMovieQuery()
		{
			if(!isset($_POST["add_title"])){
                $this->redirectToAdmin();
            }
            $movie_id = $_POST["add_movie_id"];
            $title = $_POST["add_title"];
            $language = $_POST["add_language"];
            $year = $_POST["add_year"];
            $rating = $_POST["add_rating"];
            $length = $_POST["add_length"];
            if(isset($_POST["add_isadult"])){
                $isAdult = 1;
            }else{
                $isAdult = 0;
            }
            $description = $_POST["add_description"];
            $poster = $_POST["add_poster"];
            $genre = $_POST["add_genre"];
            $actor = $_POST["add_actor"];
            $director = $_POST["add_director"];
            if($this->movieModel->createMovie($movie_id,$title,$language,$year,$rating,$length,$isAdult,$description,$poster) != NULL){
                foreach($genre as $data){
                    $this->genreModel->insertMovieGenre($movie_id,$data);
                }
                
                foreach($actor as $data){
                    $this->actorModel->insertMovieActor($movie_id,$data);
                }

                foreach($director as $data){
                    $this->directorModel->insertMovieDirector($movie_id,$data);
                }

                $this->redirectToAdminListMovie();
            }else{
                $this->redirectToAdmin();
            };
            
		}

		public function editBook($id)
        {
            $book = $this->userModel->getBookById($id);
            $category = $this->categoryModel->getAllCategory();
            $data = array();
            array_push($data, $book);
            array_push($data, $category);
            if (!$this->roleValidation('adminEditBook', $data))
            {
                $this->redirectToMain();
            }
        }

        public function editBookQuery()
        {
            $allowedthumbnailExtensions = array('jpg', 'png', ' jpeg');
            $allowedbookPDFExtensions = array('pdf');
            $directory = getAbsolutePath();
            $uploadFileDir = "../public/";

            if ($_FILES["thumbnail"]["size"] != 0)
            {
                //Get thumbnail file
                $thumbnail["tmpPath"] = $_FILES['thumbnail']['tmp_name'];
                $thumbnail["name"] = $_FILES['thumbnail']['name'];
                $thumbnail["size"] = $_FILES['thumbnail']['size'];
                $thumbnail["type"] = $_FILES['thumbnail']['type'];
                $thumbnailNameCmps = explode(".",$thumbnail["name"]);
                $thumbnail["extension"] = strtolower(end($thumbnailNameCmps));
                if (!in_array($thumbnail["extension"], $allowedthumbnailExtensions)) {
                    header("Location: http://$_SERVER[HTTP_HOST]$directory/admin/addBook?retry=thumbnail");
                    exit(1);
                }
                $thumbnail["newFileName"] = md5(time() . $thumbnail["name"]) . '.' . $thumbnail["extension"];
                $thumbnail["url"] = "fileupload/thumbnail/" . $thumbnail["newFileName"];
                $thumbnail["path"] = $uploadFileDir . $thumbnail["url"];
                if(!move_uploaded_file($thumbnail["tmpPath"], $thumbnail["path"])){
                    echo 'There was some error moving the thumbnail file to upload directory. Please make sure the upload directory is writable by web server.';
                    exit(1);
                }
                echo $thumbnail["url"];
                echo $_POST["oldBookThumbnail"];
                if (unlink($_POST["oldBookThumbnail"])){
                    echo "succesfully deleted";
                }
            }
            else
            {
                $thumbnail["url"] = $_POST["oldBookThumbnail"];
            }
            if ($_FILES["bookPDF"]["size"] != 0)
            {
                $bookPDF["tmpPath"] = $_FILES['bookPDF']['tmp_name'];
                $bookPDF["name"] = $_FILES['bookPDF']['name'];
                $bookPDF["size"] = $_FILES['bookPDF']['size'];
                $bookPDF["type"] = $_FILES['bookPDF']['type'];
                $bookPDFNameCmps = explode(".",$bookPDF["name"]);
                $bookPDF["extension"] = strtolower(end($bookPDFNameCmps));
                if (!in_array($bookPDF["extension"], $allowedbookPDFExtensions)) {
                    header("Location: http://$_SERVER[HTTP_HOST]$directory/admin/addBook?retry=bookPDF");
                    //exit(1);
                }
                $bookPDF["newFileName"] = md5(time() . $bookPDF["name"]) . '.' . $bookPDF["extension"];
                $bookPDF["url"] = "fileupload/bookPDF/" . $bookPDF["newFileName"];
                $bookPDF["path"] = $uploadFileDir . $bookPDF["url"];
                if(!move_uploaded_file($bookPDF["tmpPath"], $bookPDF["path"])){
                    exit(1);
                }
                echo "\n".$bookPDF["url"];
                if (unlink($_POST["oldBookPDF"])){
                    echo "succesfully deleted";
                }
            }

            else
            {
                echo "No bookPDF";
                $bookPDF["url"] = $_POST["oldBookPDF"];
            }

            $this->userModel->setTitle($_POST["title"]);
            $this->userModel->setAuthor($_POST["author"]);
            $this->userModel->setDescription($_POST["description"]);
            $this->userModel->setPublisher($_POST["publisher"]);
            $this->userModel->setThumbnail($thumbnail["url"]);
            $this->userModel->setBookPDF($bookPDF["url"]);

            if (isset($_POST["add-book-category"]))
            {
                $category = $_POST["add-book-category"];
                $this->userModel->setCategory($category);
                $this->userModel->updateCategory($_POST["book_id"]);
            }

            if ($this->validHTMLEntities($_POST["title"]) &&
                $this->validHTMLEntities($_POST["author"]) &&
                $this->validHTMLEntities($_POST["description"]) &&
                $this->validHTMLEntities($_POST["publisher"]) )
            {
                $this->userModel->updateBook($_POST["book_id"]);
            }
            header("Location: http://$_SERVER[HTTP_HOST]$directory/admin/listBook");

        }

        public function deleteBook($id)
        {
            if ($_SESSION['role'] && $_SESSION['role'] == 1) {
                $this->userModel->deleteBook($id);
            }
            $this->redirectToAdminListBook();
        }

        public function takeThumbnailPath($fileArray)
        {
            $thumbnail["name"] = $fileArray['name'];
            $thumbnail["size"] = $fileArray['size'];
            $thumbnail["type"] = $fileArray['type'];
            $thumbnailNameCmps = explode(".",$thumbnail["name"]);
            $thumbnail["extension"] = strtolower(end($thumbnailNameCmps));
            $thumbnail["newFileName"] = md5(time() . $thumbnail["name"]) . '.' . $thumbnail["extension"];
            $thumbnail["url"] = "fileupload/thumbnail/" . $thumbnail["newFileName"];

            return $thumbnail["url"];
        }

        public function userList()
        {
            $modelForUser = $this->model('User');
            $users = $modelForUser->getAllUser();
            if (!$this->roleValidation('adminListUser', $users))
            {
                $this->redirectToMain();
            }
        }

        public function guestList()
        {
            $emails = $this->emailModel->getAllEmail();
            if (!$this->roleValidation('adminListEmail', $emails))
            {
                $this->redirectToMain();
            }
        }

        public function deleteGuestEmail($email)
        {
            $this->emailModel->setEmail($email);
            $this->emailModel->deleteEmail();
            $this->redirectToAdminGuestList();
        }

        public function deleteUser($id)
        {
            echo $id;
            $modelForUser = $this->model('User');
            $modelForUser->deleteUser($id);
            $directory = getAbsolutePath();
            header("Location: http://$_SERVER[HTTP_HOST]$directory/admin/userList");
        }

        public function crudCategory($id = 0)
        {
            $category = $this->categoryModel->getAllCategory();
            $categoryToEdit = $this->categoryModel->getCategoryById($id);

            $data = array();
            array_push($data, $category);
            array_push($data, $categoryToEdit);
            if (!$this->roleValidation('adminCurdCategory', $data))
            {
                $this->redirectToMain();
            }
        }

        public function addCategory()
        {
            var_dump($_POST);
            if ($this->validHTMLEntities($_POST["category_name"]))
            {
                $this->categoryModel->setCategoryName($_POST["category_name"]);
                $this->categoryModel->addCategory();
            }
            $this->redirectToAdminListCategory();
        }

        public function editCategory($id)
        {
            var_dump($_POST);
            if ($this->validHTMLEntities($_POST["category_name"]))
            {
                $this->categoryModel->setCategoryName($_POST["category_name"]);
                $this->categoryModel->editCategory($id);
            }
            $this->redirectToAdminListCategory();
        }

        public function deleteCategory($id)
        {
            $this->categoryModel->deleteCategory($id);
            $this->redirectToAdminListCategory();
        }

        public function commentManage($id)
        {
            $reviews = $this->commentModel->getCommentByBookId($id);
            if (!$this->roleValidation('adminManageComment', $reviews))
            {
                $this->redirectToMain();
            }
        }

        public function deleteComment($id_book, $id_client)
        {
            echo $id_book . " and " . $id_client;
            $this->commentModel->deleteComment($id_book, $id_client);
            $this->redirectToAdminListBook();
        }
	}