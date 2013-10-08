<?php
namespace Facades;

trait Facade
{
	protected static $_instances = [];

	public static function load($instance)
	{
		static::$_instances[] = $instance;
	}

	public static function __callStatic($name, $arguments) 
	{ 
		$instances = static::$_instances;
        foreach ($instances as $instance) {
            $object = new $instance;
            if(method_exists($object, $name)) 
            { 
                return call_user_func_array(array($object, $name), $arguments);  
            }
        }
        
		$selfclass = get_called_class();
        $self = new $selfclass;
        if (method_exists($self, $name)) 
        {
        	return call_user_func_array(array($self, $name), $arguments);
        }

        throw new \Exception("Method do not exist.");
        
        return null;  
	}
}