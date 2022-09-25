<?php
require_once(__DIR__ . "/../autoloader.php");
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/blade.php';

echo $blade->make('layout')->render();