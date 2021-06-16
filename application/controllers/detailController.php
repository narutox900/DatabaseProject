<?php  
	/**
	 * 
	 */
	class detailController extends Controller
	{
		public function __construct()
		{
			$this->userModel = $this->model('Movie');
		}

		public function index($id=0)
		{
			if(intval($id) == 0){
				header("Location: ".LINK."/search");
			}
			$id = strval(intval($id));

			$movie = $this->userModel->getMovieById($id);

			if($movie == NULL){
				header("Location: ".LINK."/search");
			}

			$this->view('detail',$movie);
		}
	}
?>