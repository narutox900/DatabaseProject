<?php  
	/**
	 * 
	 */
	class readController extends Controller
	{
		public function __construct()
		{
			$this->userModel = $this->model('Book');
		}

		public function index($id=0)
		{
			if(intval($id) == 0){
				header("Location: ".LINK."/book");
			}
			$id = strval(intval($id));
			// $books = $this->userModel->getAllBook();
			$book = $this->userModel->getBookById($id);
			$comment = $this->userModel->getAllComment($id);

			if($book == NULL){
				header("Location: ".LINK."/book");
			}

			if($comment != NULL){
				array_push($book,$comment);
			}else{
				$comment = 'NULL';
				array_push($book,$comment);
			}

			if(isset($_SESSION["client_id"])){
				$userComment = $this->userModel->getComment($id,$_SESSION["client_id"]);
				if($userComment == NULL){
					$this->view('read',$book);
				}else{
					array_push($book,$userComment[0]);
					$this->view('read',$book);
				}
			}else{
				$this->view('read',$book);
			}
		}

		public function createComment($book_id){
			if(isset($_SESSION["client_id"])){
				if(isset($_POST["your-rate"])){
					$comment = $this->userModel->getComment($book_id,$_SESSION["client_id"]);
					if($comment == NULL){
						$this->userModel->createComment($book_id,$_SESSION["client_id"],$_POST["your-rate"],$_POST["your-review"]);
						header("Location: ".LINK."/read/".$book_id);
					}else{
						//echo "Error";
						header("Location: ".LINK."/read/".$book_id);
					}
				}else{
					//echo "Error";
					header("Location: ".LINK."/book");
				}
			}else{
				//echo "Error";
				header("Location: ".LINK."/book");
			}
		}

		public function updateComment($book_id){
			if(isset($_SESSION["client_id"])){
				if(isset($_POST["your-rate"])){
					$comment = $this->userModel->getComment($book_id,$_SESSION["client_id"]);
					if($comment != NULL){
						$this->userModel->updateComment($book_id,$_SESSION["client_id"],$_POST["your-rate"],$_POST["your-review"]);
						header("Location: ".LINK."/read/".$book_id);
					}else{
						//echo "Error";
						header("Location: ".LINK."/read/".$book_id);
					}
				}else{
					//echo "Error";
					header("Location: ".LINK."/book");
				}
			}else{
				//echo "Error";
				header("Location: ".LINK."/book");
			}
		}

		public function deleteComment($book_id){
			if(isset($_SESSION["client_id"])){
				$comment = $this->userModel->getComment($book_id,$_SESSION["client_id"]);
				if($comment != NULL){
					$this->userModel->deleteComment($book_id,$_SESSION["client_id"]);
					header("Location: ".LINK."/read/".$book_id);
				}else{
					//echo "Error";
					header("Location: ".LINK."/read/".$book_id);
				}
			}else{
				//echo "Error";
				header("Location: ".LINK."/book");
			}
		}
	}
?>