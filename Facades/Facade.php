<?php
namespace Facades;

trait Facade
{
	private static $__instance = NULL;
    private static $__object = NULL;

	public static function load($instance)
	{
        if(is_null(static::$__instance))
        {
    		static::$__instance = $instance;
        }
	}

    public function __call($name, $arguments) 
    {
        return static::__facadeCaller($name, $arguments);
    }

	public static function __callStatic($name, $arguments) 
	{
        return static::__facadeCaller($name, $arguments);  
	}

    public function __set($name, $value)
    {
        $object = static::$__object;
        $object->$name = $value;
        var_dump($object);
    }

    public function  __get($name) {  
        $object = static::$__object;
        return $object->$name;
    }

    private static function __facadeCaller($name, $arguments)
    {
        static::$__object = new static::$__instance();
        if(method_exists(static::$__object, $name)) 
        { 
            return call_user_func_array([static::$__object, $name], $arguments);  
        }
        
        $instance = get_called_class();
        static::$__object = new $instance;
        if (method_exists(static::$__object, $name)) 
        {
            return call_user_func_array([static::$__object, $name], $arguments);
        }

        throw new \Exception("Method do not exist.");
        
        return null;  
    }
}