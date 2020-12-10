<?php
namespace ByteDance;

class Api
{
    public function make($name , array $config)
    {
        $name = ucfirst(strtolower($name));
        $application = "\\ByteDance\\Douyin\\Api\\{$name}";

        return new $application($config);
    }

    public function __callStatic($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
        return self::make($name , ...$arguments);
    }
}
