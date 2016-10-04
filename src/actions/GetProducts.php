<?php

	namespace api\actions;

	// use api\connection\MySQLConnection;
	use api\ActionsInterface;
	use api\utils\CheckMethod;

	class GetProducts implements ActionsInterface {

	    public function buildQuery($request){
	    	if(CheckMethod::checkGet($request->method)){
	    		$sql[] = 'SELECT DISTINCT p.id, p.name, p.short_description, p.description, p.quantity, p.price, p.front, img.data FROM products p LEFT JOIN images i on i.id_product=p.id left JOIN (SELECT name, data from images) as img on p.front = img.name ORDER BY p.id DESC';
	    	}else{
	    		$sql = false;
	    	}
	    	// var_dump($sql);
	    	return $sql;
	    }
	    
	}
