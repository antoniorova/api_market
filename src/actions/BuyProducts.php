<?php

	namespace api\actions;

	// use api\connection\MySQLConnection;
	use api\ActionsInterface;
	use api\utils\CheckMethod;

	class BuyProducts implements ActionsInterface {

	    public function buildQuery($request){
	    	if(CheckMethod::checkDelete($request->method)){
	    		$sql[] = sprintf('DELETE FROM `bag`;');
	    	}else{
	    		$sql = false;
	    	}
	    	return $sql;
	    }
	    
	}
