<?php

require __DIR__ . "/router/Router.php";
require __DIR__ . "/contracts/ContactContract.php";
require __DIR__ . "/models/ContactModel.php";
require __DIR__ . "/presenter/ContactPresenter.php";

$router = new Router();
$contactModel = new ContactModel();
$contactPresenter = new ContactPresenter($contactModel);


//contacts
$router->respond('GET', '/contact', [$contactPresenter,"getContacts"]);
$router->respond('POST', '/contact', [$contactPresenter,"setNewContact"]);



/*
Create a CRUD (API) where you will register, phone numbers in a phone book, 
you need to save the following fields:
First name.
Surnames.
Phones: N telephones can be stored.
Email: N Emails can be saved.
You must use MySQL, ensuring the integrity of every transaction 
(add dump file to the code)

You should only make the Endpoints of a REST API, which will 
be consumed through POSTMAN for its evaluation.

The use of PHP Framework is not allowed.

Nice to Have:
Save the photo of contacts.
Create a call to filter the contacts for each of the fields: Name, Surname, 
any of the captured phones and/or any of the captured emails
Code must be allocated on Github (provide the link) and please 
mount the API in a hosting and personal domain and also share it with us.

tables:

contact
phone
email

create a new contact
create a new phone
create a new email
create a new phone and email

read contacts
read contact intellisense
read contact phone
read contact emails
filters
read contact by email
read contact by name
read contact by surname
read contact by phone

update phone number
update email
update contact
update picture

delete phone number
delete email
delete contact
delete picture





*/



?>