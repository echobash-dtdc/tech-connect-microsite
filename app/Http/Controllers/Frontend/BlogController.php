<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        return view('frontend.blogs.index');
    }

    public function show()
    {
        return view('frontend.blogs.show');
    }
}
