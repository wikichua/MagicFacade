<?php
error_reporting(-1);
ini_set('display_errors', 1);

require_once 'Libs/Interfaces/BuilderInterface.php';
require_once 'Facades/Facade.php';
require_once 'Libs/Sub/SubSub/Internal.php';
require_once 'Libs/Sub/Formula.php';
require_once 'Libs/CalculatorBuilder.php';
require_once 'Libs/Building.php';
require_once 'Facades/Calculator.php';
require_once 'Device.php';

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

		Calculator::make();
		$this->assertEquals('default',Calculator::getName());
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

	public function testCheckExtendsWork()
	{
		$this->assertEquals('the formula', Calculator::getFormula());
	}

	public function testCheckDeeperExtendsWork()
	{
		$this->assertEquals('the internal', Calculator::getInternal());
	}

	public function testExtendedObjectCanCreatePropertyDynamically()
	{
		$obj = new Device;
		$obj->testing();
		$this->assertEquals('the formula', $obj->formula);
		$this->assertEquals('the internal', $obj->internal);
	}

	public function testDynamicPropertySetInTheObject()
	{
		$this->assertEquals('another sample',(new Calculator)->sample2);
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


	/**
	 * @covers class::ItCanAllowDependencyInjection()
	 */
	public function testItCanAllowDependencyInjection()
	{
		$Obj = new Calculator(new \Libs\Building);

		$this->assertSame('Libs\Building', $Obj->makeBuilding());
		$this->assertSame('Libs\Building', Calculator::makeBuilding());
	}
	

}
