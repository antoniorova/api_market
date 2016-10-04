<?php

	namespace api\execution;

	use api\ExecutionAbstract;

	class MySQLExecution extends ExecutionAbstract{
		private $result;
		private $link;

		public function __construct($_link) {
			$this->link = $_link;
		}

	    protected function runGet($sql){
	    	$rows = array();
	    	$result = mysqli_query($this->link,$sql[0]);
	    	$this->resultOk($result);
    	  	for ($i=0;$i<mysqli_num_rows($result);$i++) {
			    $rows[]= mysqli_fetch_object($result);
		  	}
		  	mysqli_free_result($result);
			return $rows;
	    }

	    protected function runPost($sql){
	    	return $this->transactionMySQL($sql);
			//return array("data" => mysqli_insert_id($this->link));
	    }

	    protected function runDelete($sql){
	    	return $this->transactionMySQL($sql);
			//return array("data" => mysqli_affected_rows($this->link));
	    }

	    protected function runPut($sql){
	    	return $this->transactionMySQL($sql);
			//return array("data" => mysqli_affected_rows($this->link));
	    }

	    private function resultOk($result) {
	    	if (!$result) {
			  http_response_code(404);
			  die(mysqli_error());
			}
	    }

	    private function transactionMySQL($sql) {
	    	mysqli_autocommit($this->link, false);
	    	mysqli_begin_transaction($this->link);
	    	foreach($sql as $query){
				mysqli_query($this->link, $query);
	    	}
	    	$last_id = array("data" => mysqli_insert_id($this->link));
	    	$result = mysqli_commit($this->link);
	    	$this->resultOk($result);
	    	return $last_id;
	    }
	}