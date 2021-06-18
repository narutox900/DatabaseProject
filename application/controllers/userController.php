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
        private $movieModel;

        public function __construct()
		{
		    $this->userModel = $this->model('User');
            $this->movieModel =  $this->model('Movie');
		}

		public function redirectToMain(){
            $directory = getAbsolutePath();
            header("Location: http://$_SERVER[HTTP_HOST]$directory");
        }

        public function redirectToPersonalInformation(){
            $directory = getAbsolutePath();
            header("Location: http://$_SERVER[HTTP_HOST]$directory/user/personal");
        }

		public function index()
		{
            if (!$this->roleValidation('user', NULL)){
                $this->redirectToMain();
            }
		}

        public function personal(){
            if(!isset($_SESSION["user_id"])){
                $this->redirectToMain();
            }
            $user = $this->userModel->getUserInformationById($_SESSION["user_id"]);
			$this->view('personal',$user);
        }

        public function pay(){
            if(!isset($_SESSION["user_id"])){
                $this->redirectToMain();
            }
            $user = $this->userModel->getUserInformationById($_SESSION["user_id"]);
			$this->view('pay',$user);
        }

        public function payQuery(){
            if(!isset($_SESSION["user_id"])){
                $this->redirectToMain();
            }
            if(isset($_POST["pay"])){
                $user = $this->userModel->getUserInformationById($_SESSION["user_id"]);
                switch ($_POST["pay"]) {
                    case 10:
                        $expired_date = date('Y-m-d',strtotime($user[0]["User"]["expired_date"]. ' + 30 days'));
                        break;
                    case 35:
                        $expired_date = date('Y-m-d',strtotime($user[0]["User"]["expired_date"]. ' + 120 days'));
                        break;
                    case 100:
                        $expired_date = date('Y-m-d',strtotime($user[0]["User"]["expired_date"]. ' + 365 days'));
                        break;
                    default:
                        $this->redirectToPersonalInformation();
                }
                $this->userModel->updateExpiredDateById($_SESSION["user_id"],$_POST["pay"],$expired_date);
                $this->redirectToPersonalInformation();
            }
        }

		public function editInformation(){
            if(!isset($_SESSION["user_id"])){
                $this->redirectToMain();
            }
            $user = $this->userModel->getUserInformationById($_SESSION["user_id"]);
			$this->view('userEditInformation',$user);
		}

        public function editInformationQuery(){
            if(!isset($_SESSION["user_id"])){
                $this->redirectToMain();
            }
            if(isset($_POST['edit_new_password'])){
                if($this->userModel->checkPassword($_POST["edit_email"],$_POST["edit_old_password"])){
                    $this->userModel->editUserInformation($_SESSION["user_id"],$_POST["edit_email"],$_POST["edit_new_password"],$_POST["edit_name"],$_POST["edit_dob"]);
                    $_SESSION["name"] = $_POST["edit_name"];
                    $_SESSION["date_of_birth"] = $_POST["edit_dob"];
                    $this->redirectToPersonalInformation();
                }else{
                    $this->redirectToMain();
                };
            }else{
                $this->redirectToMain();
            }
        }

        public function history(){
            if(!isset($_SESSION["user_id"])){
                $this->redirectToMain();
            }
            $movie = $this->movieModel->getHistory($_SESSION["user_id"]);
            $this->view('history',$movie);
        }

        public function favourite(){
            if(!isset($_SESSION["user_id"])){
                $this->redirectToMain();
            }
            $movie = $this->movieModel->getFavourite($_SESSION["user_id"]);
            $this->view('favourite',$movie);
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

	}

?>