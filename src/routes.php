<?php

function register_routes($slim)
{
    $slim->get('/hello/{name}', function (\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, array $args) {
        $name = $args['name'];

        $cat = new Category;
        $cat->name = "category x";
        $cat->save();


        $response->getBody()->write("Hello, $name");
        return $response;
    });
}