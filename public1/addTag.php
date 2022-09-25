<?php
require_once(__DIR__ . "/../autoloader.php");
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/blade.php';

use \Hillel\Models\Tag;
$title = '';
$slug = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    if($title && $slug){
        $category = new Tag();
        $category->title = $title;
        $category->slug = $slug;
        $category->save();
        header('location:/tags.php');
    }
}

$pageTitle = 'Add Tag';

/** @var $blade */
echo $blade->make('tags/create-tag', [
    'pageTitle' => $pageTitle,
    'title' => $title,
    'slug' => $slug,
])->render();