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

        }else if(strpos( $param, '+')){

        }else if(filter_var($param, FILTER_VALIDATE_EMAIL)){

        }else{
            $result = $this->model->fetchContactsByName($param);
            echo json_encode($result); 
        }
    }

    public function addNewPhoneAndEmail($id){
        $email = isset($_POST['email'])?explode("|",$_POST['email']):[];
        $phone = isset($_POST['phone'])?explode("|",$_POST['phone']):[];
        if(sizeof($phone) > 0){
            foreach ($phone as &$number) {
                $this->model->insertPhone($number, $id);
            }
        } 

        if(sizeof($email) > 0){
            foreach ($email as &$mail) {
                $this->model->insertEmail($mail, $id);
            }
        } 

        //TODO handler errors
        $data = [ 'success' => $success];
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function setNewContact(){
        $success = $this->model->setNewContact();
        $data = [ 'success' => $success];
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function updateEmail($id){
        $this->model->updateEmail($id);
        $data = [ 'success' => true];
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function updatePhone($id){
        $this->model->updatePhone($id);
        $data = [ 'success' => true];
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function updateContact($id){
        $this->model->updateContact($id);
        $data = [ 'success' => true];
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function deleteEmail($id){
        $this->model->deleteEmail($id);
        $data = [ 'success' => true];
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function deletePhone($id){
        $this->model->deletePhone($id);
        $data = [ 'success' => true];
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function deleteContact($id){
        $this->model->deleteContact($id);
        $data = [ 'success' => true];
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function dumpDB(){
        $this->model->dumpDB();
        $data = [ 'success' => true];
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