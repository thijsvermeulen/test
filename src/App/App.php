<?php

namespace App;

class App
{
    private $slim;

    public function __construct()
    {
        $conf = array_merge(parse_ini_file('../conf-default.ini'), parse_ini_file('../conf-local.ini'));

        $eloquent = new \Illuminate\Database\Capsule\Manager;
        $eloquent->addConnection([
            'driver'    => 'mysql',
            'host'      => $conf['db_host'],
            'database'  => $conf['db_name'],
            'username'  => $conf['db_user'],
            'password'  => $conf['db_pass'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '' ]);
        $eloquent->setAsGlobal();
        $eloquent->bootEloquent();

        $this->slim = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);

        \App\Controllers\CategoryController::register($this->slim);
    }

    public function run() {
        $this->slim->run();
    }
}