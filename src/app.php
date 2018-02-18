<?php

function run() {

    $conf = array_merge( parse_ini_file('../conf-default.ini'), parse_ini_file('../conf-local.ini'));

    $eloquent = new Illuminate\Database\Capsule\Manager;
    $eloquent->addConnection([
        'driver'    => 'mysql',
        'host'      => $conf['db_host'],
        'database'  => $conf['db_name'],
        'username'  => $conf['db_user'],
        'password'  => $conf['db_pass'],
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]);
    $eloquent->setAsGlobal();
    $eloquent->bootEloquent();

    $slim = new \Slim\App;

    $slim->get('/hello/{name}', function (\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, array $args) {
        $name = $args['name'];
        $response->getBody()->write("Hello, $name");
        return $response;
    });

    return $slim;
}

