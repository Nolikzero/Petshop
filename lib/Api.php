<?php
namespace lib;

class Api
{
    /**
     * @param \api\Api $api Класс обработчик
     */
    public static function run($api, $params)
    {
        if($api instanceof \api\Api) {
            $result = $api->exec($params);
        }else{
            throw new \Exception('Неверный класс api');
        }
        return $result;
    }

}