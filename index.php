<?php
require_once (__DIR__ . '/vendor/autoload.php');
$config = require(__DIR__ . '/config/app.php');

try
{
    $result = (new \lib\App($config))->run();
    echo json_encode($result);
}catch (\Exception $exception)
{
    echo json_encode([
        'status' => 'error',
        'message' => $exception->getMessage()
    ]);
}
