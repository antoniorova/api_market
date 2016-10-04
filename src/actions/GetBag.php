<?php

	namespace api\actions;

	// use api\connection\MySQLConnection;
	use api\ActionsInterface;
	use api\utils\CheckMethod;

	class GetBag implements ActionsInterface {

	    public function buildQuery($request){
	    	if(CheckMethod::checkGet($request->method)){
	    		$sql[] = 'SELECT b.id, b.id_product, p.name, b.quantity, p.price FROM bag b LEFT JOIN products p on p.id=b.id_product';
	    	}else{
	    		$sql = false;
	    	}
	    	// var_dump($sql);
	    	return $sql;
	    }
	    
	}
