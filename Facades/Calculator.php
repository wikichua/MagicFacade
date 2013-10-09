<?php 
namespace Facades;

class Calculator
{
	use \Facades\Facade;

	public static function register()
	{
		(new self)->load('\Libs\CalculatorBuilder');
	}

	protected function functionInCalculator()
	{
		return 'Can I\'m called?';
	}
}


Calculator::register();