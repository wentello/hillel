<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/blade.php';

use \Hillel\Models\Category;
$title = '';
$slug = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    if(!empty($title) && !empty($slug)){
        $category = new Category;
        $category->title = $title;
        $category->slug = $slug;
        $category->save();
        header('location:/category.php');
    }
}

$pageTitle = 'Add Categories';

/** @var $blade */
echo $blade->make('category/create-category', [
    'pageTitle' => $pageTitle,
    'title' => $title,
    'slug' => $slug,
])->render();