<?php  
	/**
	 * 
	 */
	class userController extends Controller
	{
        /**
         * @var mixed
         */
        private $userModel;

        public function __construct()
		{
		    // $this->userModel = $this->model('Book');
            // $this->categoryModel =  $this->model('Category');
		}

		public function redirectToMain(){
            $directory = getAbsolutePath();
            header("Location: http://$_SERVER[HTTP_HOST]$directory");
        }

		public function index()
		{
            if (!$this->roleValidation('user', NULL)){
                $this->redirectToMain();
            }
		}

		public function editInformation(){
			$this->view('userEditInformation');
		}

		public function roleValidation($view, $data){
		//User role id is 2
            if ($_SESSION['role'] && $_SESSION['role'] == 2)
            {
                $this->view($view, $data);
                return 1;
            }
            return 0;
        }

		public function listBook()
        {
            $books = $this->userModel->getAllBook();
            $this->view('adminListBook', $books);
            if (!$this->roleValidation('adminListBook', $books)){
                $this->redirectToMain();
            }
        }

        public function deleteBook($id)
        {
            if ($_SESSION['role'] && $_SESSION['role'] == 1) {
                $this->userModel->deleteBook($id);
            }
            $this->redirectToAdminListBook();
        }

	}

?>