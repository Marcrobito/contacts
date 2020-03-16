<?php

//require __DIR__ . "../contracts/ContactContract.php";

//require '../contracts/ContactContract.php';


class ContactModel implements iContactModel{

    public $presenter;


    public function setPresenter($presenter)
    {
        $this->presenter = $presenter;
    }

    public function fetchContactsByName($string){
        return "Contacts";
    }

    public function setNewContact(){
        $image = getimagesize($_FILES["photo"]["tmp_name"]);
            print_r($image);
            print_r($_POST);
    }

}

?>