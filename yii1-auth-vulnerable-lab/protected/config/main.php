<?php
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Yii1 Auth Lab',

    'components'=>array(

        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=auth_lab',
            'username' => 'root',
            'password' => 'root123', // ❌ Hardcode
            'charset' => 'utf8',
        ),

        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning, info',
                ),
            ),
        ),
    ),
);
