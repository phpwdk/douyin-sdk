<?php

use ByteDance\Kernel\DataArray;

/**
 * Class Dy
 * @package ByteDance
 *
 * ----Douyin---
 * @method \ByteDance\Douyin Oauth($scope, $redirect_url, $state = "") static 扫码授权
 */
class Dy
{

    /**
     * 静态配置
     */
    private static $config;


    /**
     * 设置及获取参数
     * @param array $option
     * @return array
     */
    public static function config($option = null)
    {
        if (is_array($option)) {
            self::$config = new DataArray($option);
        }
        if (self::$config instanceof DataArray) {
            return self::$config->get();
        }
        return [];
    }

    /**
     * 静态魔术加载方法
     * @param $name
     * @param $arguments
     * @return mixed
     * @throws Exception
     */
    public static function __callStatic($name , $arguments)
    {
        $name = ucfirst(strtolower($name));
        $class = "\\ByteDance\\{$name}";

        if (!empty($class) && class_exists($class)) {
            $option = array_shift($arguments);
            $config = is_array($option) ? $option : self::$config->get();
            return new $class($config);
        }

        throw new Exception("class {$name} not found");
    }
}
