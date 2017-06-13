<?php
return [
    'db' =>
        [
            'database_type' => 'mysql',
            'database_name' => 'petshop',
            'server' => 'localhost',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
    'api' =>
        [
            'route' =>
                [
                    'models' =>
                        [
                            'news' => 'models\News',
                            'session' => 'models\Session'
                        ],
                    'methods' =>
                        [
                            'Table' => 'api\ApiTable',
                            'SessionSubscribe' => 'api\ApiSessionSubscribe',
                            'PostNews' => 'api\ApiPostNews'
                        ]
                ]
        ]
];