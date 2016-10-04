<?php

	namespace api\actions;

	// use api\connection\MySQLConnection;
	use api\ActionsInterface;
	use api\utils\CheckMethod;

	class GetProduct implements ActionsInterface {

	    public function buildQuery($request){
	    	if(CheckMethod::checkGet($request->method)){
	    		$sql[] = sprintf('SELECT p.id, p.name, p.short_description, p.description, p.quantity, p.price, p.front, i.name as image_name, i.size, i.type, i.data FROM products p LEFT JOIN images i on i.id_product=p.id WHERE p.id = %d', $request->key);
	    	}else{
	    		$sql = false;
	    	}
	    	return $sql;
	    }
	    
	}
