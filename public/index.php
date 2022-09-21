<?php
require_once(__DIR__ . "/../autoloader.php");
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

use Hillel\Models\Category;
use Hillel\Models\Post;
use Hillel\Models\Tag;

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

//4. Створити 10 постів, прикріпивши довільну категорію.
/*for($i = 0; $i < 10; $i++) {
    $category_id = rand(1,5);
    if($category_id == 3){
        $category_id++;
    }

    $post = new Post();
    $post->title = 'title'.$i;
    $post->slug = 'slug'.$i;
    $post->body = 'body'.$i;
    $post->category_id = $category_id;
    $post->save();
}*/

//5. Оновити 1 пост, замінивши поля + категорію.
/*$post = Post::find(3);
$post->title = 'title99';
$post->slug = 'slug99';
$post->body = 'body99';
$post->category_id = 2;
$post->save();*/

//6. Видалити пост.
/*$post = Post::find(5);
$post->delete();*/

//7. Створити 10 тегів
/*for($i = 0; $i < 10; $i++) {
    $tag = new Tag();
    $tag->title = 'test'.$i;
    $tag->slug = 'slugr'.$i;
    $tag->save();
}*/

//8. Кожному вже збереженому посту прикріпити по 3 випадкові теги.
/*for($i = 11; $i < 21; $i++) {
    if($i==5){
        continue;
    }

    $post = Post::find($i);
    for($j=1; $j<4; $j++) {
        $tag = Tag::find(rand(1,10));
        $post->orders()->save($tag);
    }
}*/
