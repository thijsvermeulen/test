<?php

function run() {



    $eloquent = new Illuminate\Database\Capsule\Manager;
    $eloquent->addConnection([
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'database',
        'username'  => 'root',
        'password'  => 'a3d5g7',
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

