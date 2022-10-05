<?php

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;
use Hillel\Controllers\MainCategory;
use Hillel\Controllers\CategoryController;
use Hillel\Controllers\TagController;
use Hillel\Controllers\PostController;

$request = Request::createFromGlobals();

function request()
{
    global $request;

    return $request;
}

$router = new Router(new Dispatcher(), (new Container()));

function router()
{
    global $router;

    return $router;
}

$router->get('/', [MainCategory::class, 'index']);

$router->get('/category', [CategoryController::class, 'index']);
$router->get('/category/create', [CategoryController::class, 'create']);
$router->post('/category/store', [CategoryController::class, 'save']);
$router->get('/category/{id}/delete', [CategoryController::class, 'delete']);
$router->get('/category/{id}/edit/', [CategoryController::class, 'edit']);
$router->post('/category/update', [CategoryController::class, 'save']);

$router->get('/tags', [TagController::class, 'index']);
$router->get('/tags/create', [TagController::class, 'create']);
$router->post('/tags/store', [TagController::class, 'save']);
$router->get('/tags/{id}/delete', [TagController::class, 'delete']);
$router->get('/tags/{id}/edit', [TagController::class, 'edit']);
$router->post('/tags/update', [TagController::class, 'save']);

$router->get('/post', [PostController::class, 'index']);
$router->get('/post/create', [PostController::class, 'create']);
$router->post('/post/store', [PostController::class, 'save']);
$router->get('/post/{id}/delete', [PostController::class, 'delete']);
$router->get('/post/{id}/edit', [PostController::class, 'edit']);
$router->post('/post/update', [PostController::class, 'save']);