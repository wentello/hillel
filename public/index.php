<?php
require_once(__DIR__ . "/../autoloader.php");
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

use Hillel\Models\Category;
use Hillel\Models\Post;

//1. Створити 5 категорій (insert)
/*for($i = 0; $i < 5; $i++) {
    $model = new Category();
    $model->title = 'title'.$i;
    $model->slug = 'slug'.$i;
    $model->save();
}*/

//2. Змінити 1 категорію (update)
/*$model = Category::find(2);
$model->title = 'test';
$model->save();*/

//3. Видалити 1 категорію (delete).
/*$model = Category::find(3);
$model->delete();*/

for($i = 0; $i < 10; $i++) {
    $category_id = rand(1,5);
    if($category_id == 3){
        $category_id++;
    }
    $category = Category::find($category_id);
    $post = new Post();
    $post->title = 'title'.$i;
    $post->slug = 'slug'.$i;
    $post->body = 'body'.$i;
    $category->orders()->save($post);
}