<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function courses()
    {
        return view('frontend.blogs.index');
    }


    public function trainers()
    {
        return view('frontend.trainers');
    }

    public function pricing()
    {
        return view('frontend.pricing');
    }
}
