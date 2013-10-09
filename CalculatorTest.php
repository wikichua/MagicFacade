<?php
error_reporting(-1);
ini_set('display_errors', 1);

require_once 'Facades/Facade.php';
require_once 'Libs/CalculatorBuilder.php';
require_once 'Facades/Calculator.php';

use \Facades\Calculator;
/**
 * CalculatorTest
 *
 */
class CalculatorTest extends \PHPUnit_Framework_TestCase
{

	public function testCallStaticWithSuccess()
	{
		$this->assertEquals('Hello World', Calculator::testing());
		$this->assertEquals('1 and 2', Calculator::testingArguments(1,2));		
	}

	public function testUsingMagicGetSet()
	{
		$obj = Calculator::make();
		$obj2 = Calculator::make();

		
		$obj->name = 'wiki';
		$this->assertEquals('wiki',$obj->name);
		$this->assertEquals('wiki',$obj->getVariable('name'));

		$obj2->name = 'pai';
		$this->assertEquals('pai',$obj2->name);
		$this->assertEquals('pai',$obj2->getVariable('name'));
	}

	/**
	 * @expectedException exception
	 */
	public function testCallStaticWithNonSuccess()
	{
		Calculator::nonExistFunction();
	}

	public function testCallFunctionParWithCallStatic()
	{
		// if par with call static function, function must declare in protected or private
		$this->assertEquals("Can I'm called?",Calculator::functionInCalculator());
	}

	

}
