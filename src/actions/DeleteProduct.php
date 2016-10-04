<?php

	namespace api\actions;

	// use api\connection\MySQLConnection;
	use api\ActionsInterface;
	use api\utils\CheckMethod;

	class DeleteProduct implements ActionsInterface {

	    public function buildQuery($request){
	    	if(CheckMethod::checkDelete($request->method)){
	    		$sql[] = sprintf('DELETE FROM `products` WHERE id=%d;', $request->key);
	    		$sql[] = sprintf('DELETE FROM `bag` WHERE id_product=%d;', $request->key);
	    		$sql[] = sprintf('DELETE FROM `images` WHERE id_product=%d;', $request->key);
	    	}else{
	    		$sql = false;
	    	}
	    	return $sql;
	    }
	    
	}
