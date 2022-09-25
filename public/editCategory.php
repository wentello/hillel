<?php
require_once(__DIR__ . "/../autoloader.php");
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/blade.php';

use \Hillel\Models\Category;

$category = Category::find($_GET['id']);
$title = $category->title;
$slug = $category->slug;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $id = $_POST['id'];
    if($title && $slug && $id){
        $category = Category::find($id);
        $category->title = $title;
        $category->slug = $slug;
        $category->save();
        header('location:/category.php');
    }
}

$pageTitle = 'Update Categories';

/** @var $blade */
echo $blade->make('tags/update-category', [
    'pageTitle' => $pageTitle,
    'title' => $title,
    'slug' => $slug,
    'id' => $_GET['id'],
])->render();