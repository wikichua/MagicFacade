<?php 
namespace Facades;

require_once __dir__.'/../Libs/Building.php';

class Calculator
{
	use \Facades\Facade;

	public function __construct($DI = NULL)
	{
		$this->load(new \Libs\CalculatorBuilder($DI));
	}

	protected function functionInCalculator()
	{
		return 'Can I\'m called?';
	}
}


new Calculator(new \Libs\Building);