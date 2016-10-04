<?php

	namespace api;

	use api\DBConnectionInterface;

	class CallProcess {
	    private $dbConnection;
	    private $query;
	    private $result;

	    public function __construct(DBConnectionInterface $dbConnection) {
	        $this->dbConnection = $dbConnection;
	    }

	    public function doIt($request){
	    	$this->dbConnection->connect();
	    	$this->result = $this->dbConnection->execute($request);
	    	$this->dbConnection->disconnect();
	    	return $this->result;
	    }
	}