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

        return view('category/list-categories', [
            'title' => $title,
            'categories' => $categories,
        ]);
    }

    public function deleteCategory()
    {
        $request = request();
        $category = Category::find($request->input('id'));
        $category->delete();
        return new RedirectResponse('/category');
    }

    public function editCategory()
    {
        $request = request();
        $pageTitle = 'Update Categories';
        $category = Category::find($request->input('id'));
        $title = $category->title;
        $slug = $category->slug;
        return view('category/update-category', [
            'pageTitle' => $pageTitle,
            'title' => $title,
            'slug' => $slug,
            'id' => $request->input('id'),
        ]);
    }

    public function saveCategory()
    {
        $request = request();
        $id = $request->input('id');
        if($id){
            $category = Category::find($id);
            $category->title = $request->input('title');
            $category->slug = $request->input('slug');
            $category->update();
        }else{
            $category = new Category;
            $category->title = $request->input('title');
            $category->slug = $request->input('slug');
            $category->save();
        }


        return new RedirectResponse('/category');
    }

    public function addCategory()
    {
        $request = request();
        $title = $request->input('title');
        $slug = $request->input('slug');

        $pageTitle = 'Add Categories';

        return view('category/create-category', [
            'pageTitle' => $pageTitle,
            'title' => $title,
            'slug' => $slug,
        ]);
    }
}