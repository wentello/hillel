<?php

namespace Hillel\Controllers;

use \Hillel\Models\Tag;
use Illuminate\Http\RedirectResponse;

class TagController
{
    public function index()
    {
        $title = 'Categories';
        $tags = Tag::all();

        return view('tags/list-tags', [
            'title' => $title,
            'tags' => $tags,
        ]);
    }

    public function deleteTag()
    {
        $request = request();
        $id = $request->input('id');
        if (empty($id)) {
            return new RedirectResponse('/tags');
        }
        $tag = Tag::find($id);
        $tag->delete();
        return new RedirectResponse('/tags');
    }

    public function editTag()
    {
        $request = request();
        $pageTitle = 'Update Tag';
        $id = $request->input('id');
        if (empty($id)) {
            return new RedirectResponse('/tags');
        }
        $tag = Tag::find($id);
        if (empty($tag->$id)) {
            return new RedirectResponse('/tags');
        }
        $title = $tag->title;
        $slug = $tag->slug;
        return view('tags/update-tag', [
            'pageTitle' => $pageTitle,
            'title' => $title,
            'slug' => $slug,
            'id' => $request->input('id'),
        ]);
    }

    public function saveTag()
    {
        $request = request();
        $id = $request->input('id');
        if (!empty($id)) {
            $tag = Tag::find($id);
            $tag->title = $request->input('title');
            $tag->slug = $request->input('slug');
            $tag->update();
        } else {
            $tag = new Tag;
            $tag->title = $request->input('title');
            $tag->slug = $request->input('slug');
            $tag->save();
        }


        return new RedirectResponse('/tags');
    }

    public function addTag()
    {
        $request = request();
        $title = $request->input('title');
        $slug = $request->input('slug');

        $pageTitle = 'Add Tag';

        return view('tags/create-tag', [
            'pageTitle' => $pageTitle,
            'title' => $title,
            'slug' => $slug,
        ]);
    }
}