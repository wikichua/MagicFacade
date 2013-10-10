<?php
namespace Libs;



class CalculatorBuilder extends \Libs\Sub\Formula
{

	protected $name;
	public $sample;

	public function __construct(){

		$this->sample2 = 'another sample';
	}

	public function make()
	{
		$this->name = 'default';
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

	public function getName()
	{
		return $this->name;
	}

	public function setName($value)
	{
		$this->name = $value;
	}

	public function output()
	{

		return $this->sample;
	}

}