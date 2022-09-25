<?php
require_once(__DIR__ . "/../autoloader.php");
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/blade.php';

use \Hillel\Models\Category;

$title = 'Categories';
$categories = Category::all();
/** @var $blade */
echo $blade->make('category/list-categories', [
    'title' => $title,
    'categories' => $categories,
])->render();