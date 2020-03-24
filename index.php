<?php

require __DIR__ . "/router/Router.php";
require __DIR__ . "/models/Database.php";
require __DIR__ . "/contracts/ContactContract.php";
require __DIR__ . "/models/ContactModel.php";
require __DIR__ . "/presenter/ContactPresenter.php";

$router = new Router();
$db = new Database();
$contactModel = new ContactModel($db);
$contactPresenter = new ContactPresenter($contactModel);


//contacts
$router->respond('GET',  '/contact', [$contactPresenter,"getContacts"]);
$router->respond('GET',  '/contact/:val', [$contactPresenter,"getContactByIdentifier"]);
$router->respond('POST', '/contact', [$contactPresenter,"setNewContact"]);
$router->respond('POST', '/contact/:id', [$contactPresenter,"addNewPhoneAndEmail"]);


$router->respond('PUT', '/contact/:id', [$contactPresenter,"updateContact"]);
$router->respond('PUT', '/phone/:id', [$contactPresenter,"updatePhone"]);
$router->respond('PUT', '/email/:id', [$contactPresenter,"updateEmail"]);

$router->respond('DELETE', '/contact/:id', [$contactPresenter,"deleteContact"]);
$router->respond('DELETE', '/phone/:id', [$contactPresenter,"deletePhone"]);
$router->respond('DELETE', '/email/:id', [$contactPresenter,"deleteEmail"]);


?>