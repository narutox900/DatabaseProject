<?php


class guestController extends Controller
{
    private $emailModel;
    public function __construct()
    {
        $this->emailModel = $this->model('Email');
    }

    private function validHTMLEntities($inputString)
    {
        $outputString = htmlentities($inputString);
        return !strcmp($inputString, $outputString);
    }

    public function index()
    {
        $directory = getAbsolutePath();
        if ($this->validHTMLEntities($_POST["guest-mail"]))
        {
            $this->emailModel->setEmail($_POST["guest-mail"]);
            $this->emailModel->updateEmail();
        }
        header("Location: http://$_SERVER[HTTP_HOST]$directory/");
    }


}