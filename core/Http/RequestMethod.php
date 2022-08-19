<?php

namespace Core\Http;

abstract class RequestMethod {
	const POST = 'post';
	
	const GET = 'get';
	
	const PUT = 'put';
	
	const DELETE = 'delete';
	
	const OPTION = 'option';
	
	static function isEqual($method1, $method2)
	{
		return strtolower($method1) == strtolower($method2);
	}
}