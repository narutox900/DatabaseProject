<?php

/**
 * 
 */
class searchController extends Controller
{
	private $userModel;
	private $movieModel;
	private $genreModel;

	public function __construct()
	{
		$this->movieModel = $this->model('Movie');
		$this->genreModel = $this->model('Genre');
		$this->userModel = $this->model('User');
	}

	public function redirectToSearch()
	{
		$directory = getAbsolutePath();
		header("Location: http://$_SERVER[HTTP_HOST]$directory/search");
	}

	public function index()
	{
		if(!isset($_SESSION["user_id"])){
			$directory = getAbsolutePath();
			header("Location: http://$_SERVER[HTTP_HOST]$directory/login");
		}
		if (isset($_POST["search"]) && $_POST["search"] == 1) {
			if (isset($_POST["filter-title"])) {
				$title = $_POST["filter-title"];
			} else {
				$title = false;
			}

			if (isset($_POST["filter-min-year"])) {
				$min_year = $_POST["filter-min-year"];
			} else {
				$min_year = 0;
			}

			if (isset($_POST["filter-max-year"])) {
				$max_year = $_POST["filter-max-year"];
			} else {
				$max_year = 0;
			}

			if (isset($_POST["filter-min-rating"])) {
				$min_rating = $_POST["filter-min-rating"];
			} else {
				$min_rating = 0;
			}

			if (isset($_POST["filter-max-rating"])) {
				$max_rating = $_POST["filter-max-rating"];
			} else {
				$max_rating = 0;
			}

			if (isset($_POST["filter-genre"])) {
				$genre = $_POST["filter-genre"];
			} else {
				$genre = false;
			}

			if (isset($_POST["filter-language"])) {
				$language = $_POST["filter-language"];
			} else {
				$language = false;
			}

			if (isset($_POST["filter-isadult"])) {
				$isAdult = true;
			} else {
				$isAdult = false;
			}

			if (isset($_POST["filter-plot"])) {
				$plot = $_POST["filter-plot"];
			} else {
				$plot = false;
			}

			if (isset($_POST["filter-actor"])) {
				$actor = $_POST["filter-actor"];
			} else {
				$actor = false;
			}

			if (isset($_POST["filter-director"])) {
				$director = $_POST["filter-director"];
			} else {
				$director = false;
			}

			$min_length = $_POST["filter-min-length"];
			$max_length = $_POST["filter-max-length"];
			$display = $_POST["filter-display"];
			$sort = $_POST["filter-sort"];

			$movie = $this->movieModel->getMovieFromSearch($title, $min_year, $max_year, $min_rating, $max_rating, $genre, $isAdult, $language, $plot, $actor, $director, $min_length, $max_length, $display, $sort);
		}else{
			$movie = $this->movieModel->getAllMovie();
		}
		$data = array();
		$search = $this->userModel->checkAge($_SESSION["date_of_birth"]);
		$language = $this->movieModel->getAllLanguage();
		$genre = $this->genreModel->getAllGenre();
		array_push($data, $movie);
		array_push($data, $language);
		array_push($data, $genre);
		array_push($data, $search);
		$this->view('search', $data);
	}
}
