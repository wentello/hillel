<?php

namespace Hillel\Controllers;

use Hillel\Models\Category;
use \Hillel\Models\Post;
use Illuminate\Http\RedirectResponse;


class PostController
{
    public function index()
    {
        $title = 'Posts';
        $posts = Post::all();
        $categories = Category::all();

        return view('post/list', [
            'title' => $title,
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    public function delete($id)
    {
        if (empty($id)) {
            return new RedirectResponse('/post');
        }
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();

        return new RedirectResponse('/post');
    }

    public function edit($id)
    {
        $pageTitle = 'Update Post';

        if (empty($id)) {
            return new RedirectResponse('/post');
        }
        $data = !empty($_SESSION['data']) ? $_SESSION['data'] : Post::find($id);
        if (empty($data)) {
            return new RedirectResponse('/post');
        }
        $categories = Category::all();
        return view('post/edit', compact('pageTitle', 'data', 'id', 'categories'));
    }

    public function save()
    {
        $data = request()->all();

        $validator = validator()->make($data, [
            'title' => [
                'required',
                'min:3',
            ],
            'slug' => [
                'required',
                'min:3',
            ],
            'body' => [
                'required',
                'min:5',
            ],
            'category_id' => [
                'required',
                'numeric',
            ],
        ]);

        if ($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        if (!empty($data['id'])) {
            $post = Post::find($data['id']);
            $post->title = $data['title'];
            $post->slug = $data['slug'];
            $post->body = $data['body'];
            $post->category_id = $data['category_id'];
            $post->update();
        } else {
            $post = new Post;
            $post->title = $data['title'];
            $post->slug = $data['slug'];
            $post->body = $data['body'];
            $post->category_id = $data['category_id'];
            $post->save();
        }

        return new RedirectResponse('/post');
    }

    public function create()
    {
        $data = !empty($_SESSION['data']) ? $_SESSION['data'] : [];

        if (empty($data)) {
            $data = ['title' => '', 'slug' => '', 'body' => ''];
        }

        $pageTitle = 'Add Post';
        $categories = Category::all();
        return view('post/create', compact('pageTitle', 'data', 'categories'));
    }
}