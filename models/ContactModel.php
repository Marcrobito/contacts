<?php

class ContactModel implements iContactModel{

    public $presenter;
    public $db;

    public function __construct($db){
        $this->db = $db;
    }


    public function setPresenter($presenter)
    {
        $this->presenter = $presenter;
    }

    public function fetchContactsByName($string){
        $query = "SELECT * FROM contacts WHERE name LIKE '%$string%' OR surname LIKE'%$string%'";
        $result = $this->db->executeQuery($query)->fetchAll();
        return $result;
    }

    public function setNewContact(){
        
        $success = true;
        if(isset($_POST['name'])){
            
            $name = $_POST['name'];
            $surname = isset($_POST['surname'])?$_POST['surname']:"";
            $email = isset($_POST['email'])?explode("|",$_POST['email']):[];
            $phone = isset($_POST['phone'])?explode("|",$_POST['phone']):[];
            $photo = explode(".",$_FILES["photo"]["name"]);
            $photo_name =  isset($_FILES["photo"])? $this->generateRandomString(8).".".$photo[1]:"";
            $uid = $this->insertNewUser($name, $surname, $photo_name);
            $uid == 0? $success = false: $success; 

            if(isset($_FILES["photo"]) && $success == true){
                $photo_path="pictures/$photo_name";
                move_uploaded_file($_FILES["photo"]["tmp_name"], $photo_path);
            }

            if(sizeof($phone) > 0){
                foreach ($phone as &$number) {
                    $this->insertPhone($number, $uid);
                }
            } 

            if(sizeof($email) > 0){
                foreach ($email as &$mail) {
                    $this->insertEmail($mail, $uid);
                }
            } 
            return $success;
        }// return you must set a name

        
        
    }

    function insertPhone($number, $uid){
        $query = "INSERT INTO phone (number, uid) VALUES ('$number','$uid')";
        $this->db->executeQuery($query);
    }

    function insertEmail($email, $uid){
        $query = "INSERT INTO email (email, uid) VALUES ('$email','$uid')";
        $this->db->executeQuery($query);
    }
    

    function insertNewUser($name, $surname, $photo){
        $query = "INSERT INTO contacts (name, surname, photo) VALUES  
        ('$name','$surname','$photo')";
        $result =  $this->db->executeQuery($query);
		if ($result) {
			return $this->db->lastInsertId();
		} else {
			return 0;
		}
    }

    function generateRandomString($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

}

?>