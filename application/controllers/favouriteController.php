<?php  
	/**
	 * 
	 */
	class favouriteController extends Controller
	{
        private $movieModel;

		public function __construct()
		{
			$this->movieModel = $this->model('Movie');
		}

        public function redirectToSearch()
	    {
		    $directory = getAbsolutePath();
		    header("Location: http://$_SERVER[HTTP_HOST]$directory/search");
	    }

        public function redirectToUser()
	    {
		    $directory = getAbsolutePath();
		    header("Location: http://$_SERVER[HTTP_HOST]$directory/user");
	    }

		public function index($id=0)
		{
			if(intval($id) == 0){
				header("Location: ".LINK."/search");
			}
			$id = strval(intval($id));
			// $books = $this->userModel->getAllBook();
			$movie = $this->movieModel->getMovieById($id);
            if(count($movie) == 0){
                $this->redirectToSearch();
            }else{
                $this->movieModel->addFavourite($_SESSION["user_id"],$id);
                $this->redirectToUser();
            }

			
		}
		
	}
?>