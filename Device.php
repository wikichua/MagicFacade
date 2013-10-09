<?php

class Device extends \Facades\Calculator
{
	public function testing()
	{

		var_dump(static::getFormula());
		var_dump(self::getInternal());
	
	}
}