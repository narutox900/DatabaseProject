<?php  
	/**
	 * 
	 */
	class loginController extends Controller
	{
		public function __construct(){
            if(isset($_SESSION['username'])){
                $directory = getAbsolutePath();
                header("Location: http://$_SERVER[HTTP_HOST]$directory");
            } else {
                $this->userModel = $this->model('User');
            }
		}

		public function index()
		{
			$this->view('login/login');
		}

		public function loginQuery()
        {
            if(!isset($_POST["email"])){
                $directory = getAbsolutePath();
                header("Location: http://$_SERVER[HTTP_HOST]$directory/login");
            }
            $this->userModel->setEmail(trim($_POST["email"]));
            $this->userModel->setPassword(trim($_POST["password"]));
            if ($this->userModel->getLoginStatus())
            {
                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['username'] = $this->userModel->getName();
                $_SESSION['role'] = $this->userModel->getRole();
                $_SESSION['user_id'] = $this->userModel->getId();
                $_SESSION['date_of_birth'] = $this->userModel->getDateOfBirth();
                $_SESSION['expired_date'] = $this->userModel->getExpiredDate();
                $directory = getAbsolutePath();
                header("Location: http://$_SERVER[HTTP_HOST]$directory");
            }
            else {
                $this->view('login/loginfailed');
            }
        }

        public function signupQuery(){
            if(!isset($_POST["signup_email"])){
                $directory = getAbsolutePath();
                header("Location: http://$_SERVER[HTTP_HOST]$directory/login");
            }
            $this->userModel->setEmail(trim($_POST["signup_email"]));
            $this->userModel->setPassword(trim($_POST["signup_pswd"]));
            $this->userModel->setName(trim($_POST["signup_name"]));
            $this->userModel->setDateOfBirth($_POST["signup_dob"]);
            $current_time = date('Y-m-d');
            switch ($_POST["signup_expired"]) {
                case 10:
                    $expired_date = date('Y-m-d',strtotime($current_time. ' + 30 days'));
                    break;
                case 35:
                    $expired_date = date('Y-m-d',strtotime($current_time. ' + 120 days'));
                    break;
                case 100:
                    $expired_date = date('Y-m-d',strtotime($current_time. ' + 365 days'));
                    break;
                default:
                    $this->view('login/signupfailed');
            }
            $this->userModel->setExpiredDate($expired_date);
            $this->userModel->setPaid($_POST["signup_expired"]);
            if ($this->userModel->getSignUpStatus()){
                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['username'] = $this->userModel->getName();
                $_SESSION['role'] = $this->userModel->getRole();
                $_SESSION['user_id'] = $this->userModel->getId();
                $_SESSION['date_of_birth'] = $this->userModel->getDateOfBirth();
                $_SESSION['expired_date'] = $this->userModel->getExpiredDate();
                // echo "Hello";
                $directory = getAbsolutePath();
                header("Location: http://$_SERVER[HTTP_HOST]$directory");
            } else {
                // sign up failed notification
                $this->view('login/signupfailed');
            }
        }

        public function logout()
        {
            session_destroy();
            session_start();
            $directory = getAbsolutePath();
            header("Location: http://$_SERVER[HTTP_HOST]$directory");
        }
	}
?>