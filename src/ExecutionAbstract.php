<?php 
namespace api;

abstract class ExecutionAbstract
{

 	public function run($request) {
    	$classPath = 'api\\actions\\'.$request->class;
    	$action = new $classPath();
    	$sql = $action->buildQuery($request);
    	if(!$sql) {
    		return json_encode(array("data" => false));
    	}
    	$run = 'run'.ucfirst($request->method);
    	return json_encode($this->$run($sql));
    }

    abstract protected function runGet($sql);

	abstract protected function runPost($sql);

    abstract protected function runDelete($sql);

    abstract protected function runPut($sql);
}