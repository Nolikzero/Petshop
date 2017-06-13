<?php
namespace lib;

use api\Api;
use api\ApiMethod;

class App
{
    public static $db;
    public static $config;
    public static $request;

    function __construct($config = array())
    {
        self::$config = $config;
        self::$request = $_REQUEST;

        self::$db = new Medoo(self::$config['db']);
    }

    public function run()
    {
        if (isset(self::$request['action']) && self::$request['action'] != "") {
            $action = self::$request['action'];
            if (isset(App::$config['api']['route']['methods'][$action]))
            {
                $methodName = App::$config['api']['route']['methods'][$action];

                /** @var Api $method */
                $method = new $methodName();
                return $method->exec(self::$request);
            }
        } else {
            throw new \Exception('Не передан метод');
        }
    }
}