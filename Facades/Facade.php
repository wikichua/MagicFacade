<?php
namespace Facades;

trait Facade
{
	protected static $__instance = NULL;
    protected static $__objectStatic = NULL;
    protected static $__objectNonStatic = NULL;

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
        static::__facadeObjectStatic()->$name = $value;
    }

    public function __get($name)
    {
        return static::__facadeObjectStatic()->$name;
    }

    private static function __facadeCaller($name, $arguments)
    {
        $object = static::__facadeObjectStatic();
        if(method_exists($object, $name)) 
        { 
            return call_user_func_array([$object, $name], $arguments);  
        }
        
        $object = static::__facadeObjectNonStatic();
        if (method_exists($object, $name)) 
        {
            return call_user_func_array([$object, $name], $arguments);
        }

        throw new \Exception("Method do not exist.");
        
        return null;  
    }

    private static function __facadeObjectStatic()
    {
        return static::$__objectStatic = is_null(static::$__objectStatic)? 
            new static::$__instance():static::$__objectStatic;
    }

    private static function __facadeObjectNonStatic()
    {
        $instance = get_called_class();
        return static::$__objectNonStatic = is_null(static::$__objectNonStatic)? 
            new $instance():static::$__objectNonStatic;
    }
}