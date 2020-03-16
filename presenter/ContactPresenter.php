<?php
class ContactPresenter implements iContactPresenter{

    public $endPoint;
    public $model;

    public function __construct($model) {
        $this->model = $model;
    }
    
    public function setEndPoint($endPoint)
    {
        $this->endPoint = $endPoint;
    }

    public function getContacts(){
        echo $this->model->fetchContactsByName("");
    }

    public function setNewContact(){
        $this->model->setNewContact();
    }
}


?>