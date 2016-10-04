<?php
	namespace api\actions;

	// use api\connection\MySQLConnection;
	use api\ActionsInterface;
	use api\utils\CheckMethod;

	class AddProductBag implements ActionsInterface {

	    public function buildQuery($request){
	    	if(CheckMethod::checkPost($request->method)){
	    		$sql[] = sprintf('INSERT INTO `bag` (id_product, name, quantity)
	    		VALUES (%d, "%s", %d);', $request->input['id_product'], $request->input['name'], $request->input["quantity"]);
	    	}else{
	    		$sql = false;
	    	}
	    	return $sql;
	    }
	}
