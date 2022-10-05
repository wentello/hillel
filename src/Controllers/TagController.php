<?php

namespace Hillel\Controllers;

use Hillel\Models\Post;
use \Hillel\Models\Tag;
use \Hillel\Models\PostTag;
use Illuminate\Http\RedirectResponse;

class TagController
{
    public function index()
    {
        $title = 'Categories';
        $tags = Tag::all();

        $postTags = new PostTag();
        $postTags->posts();
        $objPostTags = $postTags->get();
        $arrPostTags = [];
        foreach ($objPostTags as $postTag){
            $arrPostTags[$postTag->tag_id][] = Post::find($postTag->post_id);
        }

        return view('tags/list', compact('title', 'tags', 'arrPostTags', 'postTags'));
    }

    public function delete($id)
    {
        if (empty($id)) {
            return new RedirectResponse('/tags');
        }
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();
        return new RedirectResponse('/tags');
    }

    public function edit($id)
    {
        $pageTitle = 'Update Tag';

        if (empty($id)) {
            return new RedirectResponse('/tags');
        }
        $data = !empty($_SESSION['data']) ? $_SESSION['data'] : Tag::find($id);
        if (empty($data)) {
            return new RedirectResponse('/tags');
        }
        $posts = Post::all();
        return view('tags/edit', compact('pageTitle','data', 'id', 'posts'));
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
            'post_id' => [
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
            $tag = Tag::find($data['id']);
            $tag->title = $data['title'];
            $tag->slug = $data['slug'];
            $tag->update();
            $tag->posts()->detach();

            $postTag = new PostTag;
            $postTag->post_id = $data['post_id'];
            $postTag->tag_id = $data['id'];
            $postTag->save();
        } else {
            $tag = new Tag;
            $tag->title = $data['title'];
            $tag->slug = $data['slug'];
            $tag->save();
        }

        return new RedirectResponse('/tags');
    }

    public function create()
    {
        $data = !empty($_SESSION['data']) ? $_SESSION['data'] : [];
        if (empty($data)) {
            $data = ['title' => '', 'slug' => ''];
        }
        $pageTitle = 'Add Tag';

        return view('tags/create', compact('pageTitle','data'));
    }
}