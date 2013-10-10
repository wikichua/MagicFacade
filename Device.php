<?php

class Device extends \Facades\Calculator
{
	public 
		$formula, 
		$internal;

	public function testing()
	{

		$this->formula = static::getFormula();
		$this->internal = self::getInternal();
	
	}
}