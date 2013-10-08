<?php
namespace Libs;

class CalculatorBuilder 
{

	public function testing()
	{
		return 'Hello World';
	}

	public function testingArguments($a, $b)
	{
		return "$a and $b";
	}

}