<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class CategoryController
{
    public static function register( \Slim\App $slim ) {

        $slim->get('/category/{id}', get_class().':category');
        $slim->get('/categories', get_class().':categories');
    }

    public function category( Request $request, Response  $response, array $args ) {
        $response->getBody()->write("Category name: ". \App\Models\Category::find($args['id'])->name);
    }

    public function categories( Request $request, Response  $response, array $args ) {
        $cats = \App\Models\Category::get()->all();

        foreach($cats as $cat) {
            $response->getBody()->write("Category name: ". $cat->name);
        }

    }
}