<?php
class ContactPresenter implements iContactPresenter{

    public $endPoint;
    public $model;

    public function __construct($model) {
        $this->model = $model;
    }
    
    public function setEndPoint($endPoint){
        $this->endPoint = $endPoint;
    }

    public function getContacts(){
        $result = $this->model->fetchContactsByName("");
        echo json_encode($result);
    }

    public function getContactByIdentifier($param){
        if(is_numeric($param)){

        }else if($this->checkEmail($param)){

        }else{
            $result = $this->model->fetchContactsByName($param);
            echo json_encode($result); 
        }
    }

    public function setNewContact(){
        $success = $this->model->setNewContact();
        $data = [ 'success' => $success];
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function checkEmail($email) {
        $find1 = strpos($email, '@');
        $find2 = strpos($email, '.');
        return ($find1 !== false && $find2 !== false && $find2 > $find1);
    }
}


?>