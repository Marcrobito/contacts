<?php

interface iContactEndPoint{

}

interface iContactPresenter{
    public function setEndPoint($endPoint);
}

interface iContactModel{
    public function setPresenter($presenter);
    public function fetchContactsByName($string);
}

?>