<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => env('DATABASE_DRIVER'),
    'host' => env('DATABASE_HOST'),
    'database' => env('DATABASE_NAME'),
    'username' => env('DATABASE_USERNAME'),
    'password' => env('DATABASE_PASSWORD'),
    'charset' => env('DATABASE_CHARSET'),
    'collation' => env('DATABASE_COLLATION'),
    'prefix' => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();