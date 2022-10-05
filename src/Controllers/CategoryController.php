<?php

namespace Hillel\Controllers;

use \Hillel\Models\Category;
use Illuminate\Http\RedirectResponse;


class CategoryController
{
    public function index()
    {
        $title = 'Categories';
        $categories = Category::all();

        return view('category/list', [
            'title' => $title,
            'categories' => $categories,
        ]);
    }

    public function delete($id)
    {
        if (empty($id)) {
            return new RedirectResponse('/category');
        }
        $category = Category::find($id);
        $category->posts()->delete();
        $category->delete();

        return new RedirectResponse('/category');
    }

    public function edit($id)
    {
        $pageTitle = 'Update Categories';

        if (empty($id)) {
            return new RedirectResponse('/category');
        }
        $data = !empty($_SESSION['data']) ? $_SESSION['data'] : Category::find($id);
        if (empty($data)) {
            return new RedirectResponse('/category');
        }

        return view('category/edit', compact('pageTitle','data', 'id'));
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
        ]);

        if ($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        if (!empty($data['id'])) {
            $category = Category::find($data['id']);
            $category->title = $data['title'];
            $category->slug = $data['slug'];
            $category->update();
        } else {
            $category = new Category;
            $category->title = $data['title'];
            $category->slug = $data['slug'];
            $category->save();
        }

        return new RedirectResponse('/category');
    }

    public function create()
    {
        $data = !empty($_SESSION['data']) ? $_SESSION['data'] : [];
        if (empty($data)) {
            $data = ['title' => '', 'slug' => ''];
        }

        $pageTitle = 'Add Categories';

        return view('category/create', compact('pageTitle','data'));
    }
}