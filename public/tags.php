<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/blade.php';

use \Hillel\Models\Tag;

$title = 'Tags';
$tags = Tag::all();
/** @var $blade */
echo $blade->make('tags/list-tags', [
    'title' => $title,
    'tags' => $tags,
])->render();