<?php
require_once(__DIR__ . "/../autoloader.php");
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/blade.php';

use \Hillel\Models\Tag;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $category = Tag::find($_GET['id']);
    $category->delete();
    header('location:/tags.php');
}
