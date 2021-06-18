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

        public function userList()
        {
            $modelForUser = $this->model('User');
            $users = $modelForUser->getAllUser();
            if (!$this->roleValidation('adminListUser', $users))
            {
                $this->redirectToMain();
            }
        }

        public function deleteUser($id)
        {
            echo $id;
            $modelForUser = $this->model('User');
            $modelForUser->deleteUser($id);
            $directory = getAbsolutePath();
            header("Location: http://$_SERVER[HTTP_HOST]$directory/admin/userList");
        }

        public function editMovie($id)
        {
            $data = array();
            $genre = $this->genreModel->getAllGenre();
            $actor = $this->actorModel->getActorAddMovie();
            $director = $this->directorModel->getDirectorAddMovie();
            $movie = $this->movieModel->getAllLanguage();
            $old_movie = $this->movieModel->getMovieById($id);
            array_push($data,$genre);
            array_push($data,$actor);
            array_push($data,$director);
            array_push($data,$movie);
            array_push($data,$old_movie);
            if (!$this->roleValidation('adminEditMovie', $data)){
                $this->redirectToMain();
            }
        }

        public function editMovieQuery()
		{
			if(!isset($_POST["edit_title"])){
                $this->redirectToAdmin();
            }
            $movie_id = $_POST["edit_movie_id"];
            $title = $_POST["edit_title"];
            $language = $_POST["edit_language"];
            $year = $_POST["edit_year"];
            $rating = $_POST["edit_rating"];
            $length = $_POST["edit_length"];
            if(isset($_POST["edit_isadult"])){
                $isAdult = 1;
            }else{
                $isAdult = 0;
            }
            $description = $_POST["edit_description"];
            $poster = $_POST["edit_poster"];
            $genre = $_POST["edit_genre"];
            $actor = $_POST["edit_actor"];
            $director = $_POST["edit_director"];

            $genre = $this->genreModel->getMovieGenreByMovieID($movie_id);
            $actor = $this->actorModel->getActorInMovieById($movie_id);
            $director = $this->directorModel->getDirectorInMovieById($movie_id);

            foreach($genre as $data){
                //echo $data;
                $this->genreModel->deleteMovieGenre($movie_id,$data["Movie_genre"]["genre_id"]);
            }
            
            foreach($actor as $data){
                //$this->actorModel->insertMovieActor($movie_id,$data);
                $this->actorModel->deleteMovieActor($movie_id,$data["Movie_actor"]["actor_id"]);
            }

            foreach($director as $data){
                //$this->directorModel->insertMovieDirector($movie_id,$data);
                $this->directorModel->deleteMovieDirector($movie_id,$data["Movie_director"]["director_id"]);
            }

            if($this->movieModel->updateMovie($movie_id,$title,$language,$year,$rating,$length,$isAdult,$description,$poster) != NULL){
                foreach($genre as $data){
                    $this->genreModel->insertMovieGenre($movie_id,$data["Movie_director"]["genre_id"]);
                }
                
                foreach($actor as $data){
                    $this->actorModel->insertMovieActor($movie_id,$data["Movie_actor"]["actor_id"]);
                }

                foreach($director as $data){
                    $this->directorModel->insertMovieDirector($movie_id,$data["Movie_director"]["director_id"]);
                }

                $this->redirectToAdminListMovie();
            }else{
                $this->redirectToAdmin();
            };
            
		}
	}