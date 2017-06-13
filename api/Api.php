<?php
namespace api;

abstract class Api
{
    abstract function exec($params = array());

    public function result($message = '', $payload = array())
    {
        $result = [
            'status' => 'ok',
        ];
        if ($message) {
            $result['message'] = $message;
        }
        if ($payload) {
            $result['payload'] = $payload;
        }
        return $result;
    }
}