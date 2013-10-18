<?php
namespace Libs;

class CalculatorBuilder extends \Libs\Sub\Formula
{

	protected $name;
	public $sample;
	protected $Building;

	public function __construct(\Libs\Interfaces\BuilderInterface $Building = NULL){

		$this->sample2 = 'another sample';
		$this->Building = $Building;
	}

	public function make()
	{
		$this->name = 'default';
		return $this;
	}

	public function makeBuilding()
	{
		return $this->Building->make();
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