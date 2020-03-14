<?php

class Router{
    function __construct() {
        $this->setMethod($_SERVER['REQUEST_METHOD']);
        $this->setRequest($_SERVER['REQUEST_URI']);
    }
    private function setMethod($method){
        $this->method = $method;
    }
    private function getMethod(){
        return $this->method;
    }
    private function setRequest($request){
        $this->request = $request;
    }
    private function getRequest(){
        return $this->request;
    }
    public function respond($method, $request, $function){
        if($method == $this->method && $request == $this->request){
            $function();
        }else{
            //404
            return;
        }

    }
}

?>