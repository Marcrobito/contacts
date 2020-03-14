<?php

require __DIR__ . "/models/ContactEntity.php";
require __DIR__ . "/router/Router.php";

$router = new Router();

$router->respond('GET', '/', doSomething);
$router->respond('POST', '/', doPostNothing);
$router->respond('GET', '/hola', doNothing);

function doSomething(){
    echo "somet<br>";
}
function doNothing(){
    echo "<br>";
}
function doPostNothing(){
    echo "lol";
}
/*

viper
switch ($request) {
    case '/' :
        require __DIR__ . '/views/index.php';
        break;
    case '' :
        require __DIR__ . '/views/index.php';
        break;
    case '/about' :
        require __DIR__ . '/views/about.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}
*/

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