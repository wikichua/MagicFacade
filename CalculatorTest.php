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

		Calculator::setName('pai');
		$this->assertEquals('pai',Calculator::getName());	
	}

	public function testCallMake()
	{
		$obj = (new Calculator)->make();
		$this->assertEquals('default',$obj->getName());
		$this->assertEquals('default',Calculator::getName());
	}

	public function testUsingMagicGetSet()
	{
		$obj = new Calculator();

		$obj->sample = 'wiki';
		$this->assertEquals('wiki',$obj->sample);
		$this->assertEquals('wiki',$obj->output());
		$this->assertEquals('wiki',Calculator::output());

		$obj2 = new Calculator();

		$obj2->sample = 'pai';
		$this->assertEquals('pai',$obj2->sample);
		$this->assertEquals('pai',$obj2->output());
		$this->assertEquals('pai',Calculator::output());
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
