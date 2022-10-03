<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/blade.php';

use \Hillel\Models\Category;

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['id'])) {
    $category = Category::find($_GET['id']);
    $category->posts()->delete();
    $category->delete();
}
header('location:/category.php');
