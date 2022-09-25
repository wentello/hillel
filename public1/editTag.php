<?php
require_once(__DIR__ . "/../autoloader.php");
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/blade.php';

use \Hillel\Models\Tag;

$tag = Tag::find($_GET['id']);
$title = $tag->title;
$slug = $tag->slug;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $id = $_POST['id'];
    if($title && $slug && $id){
        $tag = Tag::find($id);
        $tag->title = $title;
        $tag->slug = $slug;
        $tag->save();
        header('location:/tags.php');
    }
}

$pageTitle = 'Update Tag';

/** @var $blade */
echo $blade->make('tags/update-tag', [
    'pageTitle' => $pageTitle,
    'title' => $title,
    'slug' => $slug,
    'id' => $_GET['id'],
])->render();