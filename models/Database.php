<?php
define('DB_HOST', 'us-cdbr-iron-east-04.cleardb.net');
define('DB_NAME', 'heroku_a26cccf465a06c4');
define('DB_USER', 'b2ed1c89af4779');
define('DB_PASS', '39e19dbd');

class Database extends PDO
{
	
	function __construct()
	{
		# code...
		parent::__construct('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
	}

	function executeQuery($query){
		$this->query("SET NAMES 'UTF8'");
		return $this->query($query);
	}
}

?>