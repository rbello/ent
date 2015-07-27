<?php
return array(
    'persistence' => array(
        'dbname'   => 'mydb',
        'user'     => 'user',
        'password' => 'secret',
        'host'     => 'localhost',
        'driver'   => 'pdo_mysql'
    ),
    'auth0' => array(
        'domain'        => 'Your domain',
        'client_id'     => 'Your client ID',
        'client_secret' => 'Your client Secret Key',
        'redirect_uri'  => 'http://YOUR_APP/callback'
    ),
    'debug' => false
);