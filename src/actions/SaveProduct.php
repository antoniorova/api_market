<?php

	namespace api\actions;

	// use api\connection\MySQLConnection;
	use api\ActionsInterface;
	use api\utils\CheckMethod;

	class SaveProduct implements ActionsInterface {

	    public function buildQuery($request){
	    	if(CheckMethod::checkPost($request->method)){
	    		$sql[] = sprintf('INSERT INTO `products` (name, short_description, description, quantity, price, front)
	    		VALUES ("%s", "%s", "%s", %d, %d, "%s");', $request->input['name'], $request->input['short_description'], $request->input['description'], $request->input["quantity"], $request->input["price"], $request->input["front"]);

	    		if(count($request->input["images"]) > 0) {
	    			$sql[] = "SET @id = LAST_INSERT_ID();";
	    			foreach($request->input["images"] as $image) {
						$sql[] = sprintf('INSERT INTO images (id_product, name, size, type, data) VALUES (@id, "%s", %d, "%s", "%s");', $image["name"], $image["size"], $image["type"], $image["data"]);
					}
    			}
	    	}else{
	    		$sql = false;
	    	}
	    	return $sql;
	    }
	}
