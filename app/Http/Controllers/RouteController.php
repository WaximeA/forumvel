<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function getHomepage()
    {
        return view('homepage');
    }

    public function getCategories()
    {
        return view('categories/categories');
    }

    public function getAddCategory()
    {
        return view('categories/add_category');
    }
}
