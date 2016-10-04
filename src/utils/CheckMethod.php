<?php
namespace api\utils;

class CheckMethod {
	private static $post = 'POST';
	private static $put = 'PUT';
	private static $get = 'GET';
	private static $delete = 'DELETE';
	public $method;

	static public function checkPost($method){
		return $method === self::$post;
	}

	static public function checkGet($method){
		return $method === self::$get;
	}

	static public function checkPut($method){
		return $method === self::$put;
	}

	static public function checkDelete($method){
		return $method === self::$delete;
	}
}