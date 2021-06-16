<?php  
	/**
	* Route class - dpth
	*/
	class Route 
	{
		protected $currentController = 'main';
		protected $currentMethod = 'index';
		protected $params = [];

		public function __construct()
		{
			// print_r($this->getUrl());
			$url = $this->getUrl();

			//GET CONTROLLER
			if (file_exists('../application/controllers/'. ($url[0]) . 'Controller.php')) {
				$this->currentController = ($url[0]);
				//echo ($url[0]);
				unset($url[0]);
			}
			// echo '../application/controllers/'. $this->currentController . 'Controller.php';
			require_once '../application/controllers/'. $this->currentController . 'Controller.php';
			$this->currentController = $this->currentController.'Controller';
			$this->currentController = new $this->currentController;

			//GET METHOD
			if (isset($url[1])) {
				if (method_exists($this->currentController, $url[1])) {
					$this->currentMethod = $url[1];
//					echo ($url[1]);
					unset($url[1]);
				}
			}

			//echo realpath('css/header.css'), PHP_EOL;


			//GET PARAMS
			$this->params = $url ? array_values($url) : [];
			call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

		}

		public function getUrl() {
			if(isset($_GET['url'])){
			    $url = rtrim($_GET['url'], '/');
			    $url = filter_var($url, FILTER_SANITIZE_URL);
                return explode('/', $url);
			}else{
				$url = rtrim('main', '/');
			    $url = filter_var($url, FILTER_SANITIZE_URL);
                return explode('/', $url);
			}
		}
	}	
