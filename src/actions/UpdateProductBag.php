<?php

	namespace api\actions;

	// use api\connection\MySQLConnection;
	use api\ActionsInterface;
	use api\utils\CheckMethod;

	class UpdateProductBag implements ActionsInterface {

	    public function buildQuery($request){
	    	if(CheckMethod::checkPut($request->method)){
	    		$sql[] = sprintf('UPDATE `bag` SET quantity=%d WHERE id=%d;', $request->input["quantity"], $request->key);
	    	}else{
	    		$sql = false;
	    	}
	    	return $sql;
	    }
	    
	}
