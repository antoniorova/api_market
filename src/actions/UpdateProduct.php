<?php

	namespace api\actions;

	// use api\connection\MySQLConnection;
	use api\ActionsInterface;
	use api\utils\CheckMethod;

	class UpdateProduct implements ActionsInterface {

	    public function buildQuery($request){
	    	if(CheckMethod::checkPut($request->method)){
	    		$sql[] = sprintf('UPDATE `products` SET name="%s", short_description="%s", description="%s", quantity=%d, price=%d, front="%s" WHERE id=%d;', $request->input['name'], $request->input['short_description'], $request->input['description'], $request->input["quantity"], $request->input["price"], $request->input["front"], $request->key);

	    		$sql[] = sprintf('DELETE from `images` where id_product=%d;', $request->key);

	    		if(count($request->input["images"]) > 0) {

	    			foreach($request->input["images"] as $image) {
						$sql[] = sprintf('INSERT INTO `images` (id_product, name, size, type, data) VALUES (%d, "%s", %d, "%s", "%s");', $request->key, $image["name"], $image["size"], $image["type"], $image["data"]);
					}
    			}
	    	}else{
	    		$sql = false;
	    	}
	    	return $sql;
	    }
	    
	}
