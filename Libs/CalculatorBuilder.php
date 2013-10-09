<?php
namespace Libs;

class CalculatorBuilder 
{

	private static $_instance = NULL;

	public function __construct(){}

	public function make()
	{
		return $this;
	}

	public function testing()
	{
		return 'Hello World';
	}

	public function testingArguments($a, $b)
	{
		return "$a and $b";
	}

	public function getVariable($name)
	{
		return $this->$name;
	}

}