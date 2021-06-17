<?php


class User extends Model
{
    private $user_id;
    private $email;
    private $password;
    private $role;
    private $name;
    private $date_of_birth;
    private $expired_date;
    private $paid;
    
    function __construct()
    {
        parent::__construct();
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getId()
    {
        return $this->user_id;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setDateOfBirth($date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;
    }

    public function getDateOfBirth()
    {
        return $this->date_of_birth;
    }

    public function setExpiredDate($expired_date)
    {
        $this->expired_date = $expired_date;
    }

    public function getExpiredDate()
    {
        return $this->expired_date;
    }

    public function setPaid($paid)
    {
        $this->paid = $paid;
    }

    public function getPaid()
    {
        return $this->paid;
    }

    public function getUserInformationById($user_id){
        $sql = "SELECT * FROM `user` WHERE user_id = " . $user_id;
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    public function checkPassword($email,$pw){
        $sql = "SELECT * FROM `user` WHERE email = '" . $email . "' AND password = '". $pw . "'";
        if ($this->db->query($sql) != NULL) {
            return 1;
        }
        return 0;
    }

    public function editUserInformation($user_id,$email,$password,$name,$date_of_birth){
        $sql = "SELECT * FROM `user` WHERE email='".$email."'";
        if ($value = $this->db->query($sql)) {
            if($value[0]["User"]["user_id"] == $user_id){
                $sql = "UPDATE `user` SET `password` = '". $password ."', `name` = '". $name ."', `date_of_birth` = '". $date_of_birth  ."' WHERE `user`.`user_id` = ".$user_id;
                return $this->db->query($sql);
            }else{
                return NULL;
            }
        }
        return NULL;
    }

    public function getAllUser()
    {
        $sql = "SELECT * from user";
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    public function deleteUser($user_id)
    {
        $sql = "DELETE FROM `user` WHERE user_id = " . $user_id;
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    public function getLoginStatus()
    {
        $sql = "SELECT * FROM `user` WHERE email='".$this->email."' AND password = '".$this->password."'";
        if ($this->db) {
            if ($this->db->query($sql)){
                $userInfo = $this->db->query($sql);
                $this->role = $userInfo[0]["User"]["role_id"];
                $this->name = $userInfo[0]["User"]["name"];
                $this->user_id = $userInfo[0]["User"]["user_id"];
                $this->date_of_birth = $userInfo[0]["User"]["date_of_birth"];
                $this->expired_date = $userInfo[0]["User"]["expired_date"];
                return 1;
            }
            else{
                return 0;
            }
        }
        return 0;
    }

    public function updateExpiredDateById($user_id,$paid,$expired_date){
        $value = $this->getUserInformationById($user_id);
        $tmp = $value[0]["User"]["paid"] + $paid;
        $sql = "UPDATE `user` SET `paid` = ". $tmp .",`expired_date` = '". $expired_date ."' WHERE `user`.`user_id` = ".$user_id;
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    public function getLatestUser(){
        $sql = "SELECT * FROM user ORDER BY user_id DESC LIMIT 1 ";
        if ($this->db) {
            return $this->db->query($sql);
        }
        return NULL;
    }

    public function getSignUpStatus()
    {
        $sql = "SELECT * FROM `user` WHERE email='".$this->email."' ";
        if ($this->db) {
            if (count($this->db->query($sql))!=0){
                return 0;
            }else{
                $sql = "INSERT INTO `user`(`email`, `name`, `password`, `role_id`, `date_of_birth`, `expired_date`,`paid`) 
                                    VALUES ( '".$this->email."', 
                                            '".$this->name."', 
                                            '".$this->password."', 
                                            '2',
                                            '".$this->date_of_birth."',
                                            '".$this->expired_date."',
                                            '".$this->paid."')";
                if($this->db->query($sql)){
                    $this->role = '2';
                    return 1;
                }
                else
                    return 0;
            }
        }
        return 0;
    }

}