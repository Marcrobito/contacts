<?php

class Router{
    public $request;
    public $method;

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
        //This solves the problem in this escenario but 
        //i'll need a more generic solution
        $param = null;
        if ( strpos( $request, ':')){
            
            $flag = $request;
            $req1 = explode("/",substr($request, 1)); 
            $req2 = explode("/",substr($this->request,1));
            
            if($req1[0] == $req2[0] && sizeof($req2)== sizeof($req1)){
                $param = $req2[sizeof($req2) - 1]; 
                $this->request = $req1[0];
                $request = $req2[0];
            }
        }
        if($method == $this->method && $request == $this->request){
            if(is_null($param)){
                $function();
            }else{
                $function($param);
            }
            
        }else{
            //TODO 404 handler
            return;
        }

    }
}

?>