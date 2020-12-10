<?php
namespace ByteDance;

class Api
{
    public function init($name , $config)
    {
        $name = ucfirst(strtolower($name));
        $application = "\\ByteDance\\Douyin\\Api\\{$name}";

        return new $application($config);
    }
}
