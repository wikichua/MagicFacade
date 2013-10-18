<?php
namespace Libs;

class Building implements \Libs\Interfaces\BuilderInterface
{
	public function make()
	{
		return $this->getClassName();
	}

	public function getClassName()
	{
		return __CLASS__;
	}
}