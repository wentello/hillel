<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/blade.php';

use \Hillel\Models\Tag;

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['id'])) {

    $tag = Tag::find($_GET['id']);
    $tag->postTag()->delete();
    $tag->delete();
}
header('location:/tags.php');
