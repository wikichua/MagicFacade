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

	public function testCallFunctionOnAnotherInstance()
	{
		// if par with call static function, function must declare in protected or private
		$this->assertEquals("testing successful",Calculator::testing1());
	}

}
