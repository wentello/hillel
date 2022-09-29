<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/blade.php';

use \Hillel\Models\Category;

if (empty($_GET['id'])) {
    header('location:/category.php');
}
$category = Category::find($_GET['id']);
if (!$category->id) {
    header('location:/category.php');
}
$title = $category->title;
$slug = $category->slug;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $id = $_POST['id'];
    if (!empty($title) && !empty($slug) && !empty($id)) {
        $category = Category::find($id);
        $category->title = $title;
        $category->slug = $slug;
        $category->save();
        header('location:/category.php');
    }
}

$pageTitle = 'Update Categories';

/** @var $blade */
echo $blade->make('category/update-category', [
    'pageTitle' => $pageTitle,
    'title' => $title,
    'slug' => $slug,
    'id' => $_GET['id'],
])->render();