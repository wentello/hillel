<?php

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;
use Hillel\Controllers\MainCategory;
use Hillel\Controllers\CategoryController;
use Hillel\Controllers\TagController;

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
$router->get('/addCategory', [CategoryController::class, 'addCategory']);
$router->post('/addCategory', [CategoryController::class, 'saveCategory']);
$router->get('/deleteCategory', [CategoryController::class, 'deleteCategory']);
$router->get('/editCategory', [CategoryController::class, 'editCategory']);
$router->post('/editCategory', [CategoryController::class, 'saveCategory']);

$router->get('/tags', [TagController::class, 'index']);
$router->get('/addTag', [TagController::class, 'addTag']);
$router->post('/addTag', [TagController::class, 'saveTag']);
$router->get('/deleteTag', [TagController::class, 'deleteTag']);
$router->get('/editTag', [TagController::class, 'editTag']);
$router->post('/editTag', [TagController::class, 'saveTag']);
