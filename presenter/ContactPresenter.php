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

    public function getContactByIdentifier($param){
        echo $param;
    }

    public function setNewContact(){
        $success = $this->model->setNewContact();
        $data = [ 'success' => $success];
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}


?>