<?php  
	/**
	 * 
	 */
	class detailController extends Controller
	{
		private $movieModel;
		private $actorModel;
		private $directorModel;
		private $genreModel;

		public function __construct()
		{
			$this->movieModel = $this->model('Movie');
			$this->actorModel = $this->model('Actor');
			$this->directorModel = $this->model('Director');
			$this->genreModel = $this->model('Genre');
		}

		public function index($id=0)
		{
			if(intval($id) == 0){
				header("Location: ".LINK."/search");
			}
			$id = strval(intval($id));

			$data = array();
			$movie = $this->movieModel->getMovieById($id);
			$actor = $this->actorModel->getActorInMovieById($id);
			$director = $this->directorModel->getDirectorInMovieById($id);
			$genreModel = $this->genreModel->getMovieGenreByMovieID($id);
			array_push($data,$movie);
			array_push($data,$actor);
			array_push($data,$director);
			array_push($data,$genreModel);

			if($movie == NULL){
				header("Location: ".LINK."/search");
			}

			$this->view('detail',$data);
		}
	}
?>