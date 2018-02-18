<?php

error_reporting(-1);
ini_set('display_errors', 'On');

require '../vendor/autoload.php';

$app = new \Slim\App;

$app->get('/hello/{name}', function (\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->run();