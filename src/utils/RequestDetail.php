<?php
namespace api\utils;

class RequestDetail {
	public $method;
	public $request;
	public $input;
	public $key;
	public $class;

	public function __construct($server) {
		$this->method = $server['REQUEST_METHOD'];
		$this->request = explode('/', trim($server['PATH_INFO'],'/'));
		$this->input = json_decode(file_get_contents('php://input'),true);
		$this->class = preg_replace('/[^a-z0-9_]+/i','',array_shift($this->request));
		$this->key = array_shift($this->request)+0;
	}
}