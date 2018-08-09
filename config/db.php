<?php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=ec2-54-221-210-97.compute-1.amazonaws.com;dbname=d8mnn8esokjgd8', 
    'username' => 'vsoixfgnkgybwr',
    'password' => 'c4f072d5ce4e1b168c0f95fe02315719964a49e0680b2a52efee3b77ff565dd5',
    'charset' => 'utf8',
    'schemaMap' => [
      'pgsql'=> [
        'class'=>'yii\db\pgsql\Schema',
        'defaultSchema' => 'public' //specify your schema here
      ]
    ], // PostgreSQL
];
