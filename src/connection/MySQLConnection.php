<?php

	namespace api\connection;

	use api\DBConnectionInterface;
	use api\execution\MySQLExecution;

	class MySQLConnection implements DBConnectionInterface {
		private $link;

	    public function connect() {
	    	// connect to the mysql database
			$this->link = mysqli_connect('localhost', 'root', '', 'market_api');
			mysqli_set_charset($this->link,'utf8');
	        return "Conexión a la base de datos";
	    }

	    public function execute($request) {
	    	$exec = new MySQLExecution($this->link);
	    	$result = $exec->run($request);
	    	return $result;
	    }

	    public function disconnect() {
	    	mysqli_close($this->link);
	    }
	}