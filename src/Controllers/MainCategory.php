<?php

namespace Hillel\Controllers;
use Hillel\Models\Category;
use Illuminate\Http\RedirectResponse;
class MainCategory
{
    public function index()
    {
        return view('main', ['title' => 'Main Page']);
    }
}