<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = [
            [
                'id' => 1,
                'image' => 'mentor/img/course-1.jpg',
                'category' => 'Web Development',
                'price' => '$169',
                'title' => 'Website Design',
                'description' => 'Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.',
                'author_image' => 'mentor/img/trainers/trainer-1-2.jpg',
                'author_name' => 'Antonio',
                'users_count' => 50,
                'likes_count' => 65,
            ],
            [
                'id' => 2,
                'image' => 'mentor/img/course-2.jpg',
                'category' => 'Marketing',
                'price' => '$250',
                'title' => 'Search Engine Optimization',
                'description' => 'Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.',
                'author_image' => 'mentor/img/trainers/trainer-2-2.jpg',
                'author_name' => 'Lana',
                'users_count' => 35,
                'likes_count' => 42,
            ],
            [
                'id' => 3,
                'image' => 'mentor/img/course-3.jpg',
                'category' => 'Content',
                'price' => '$180',
                'title' => 'Copywriting',
                'description' => 'Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.',
                'author_image' => 'mentor/img/trainers/trainer-3-2.jpg',
                'author_name' => 'Brandon',
                'users_count' => 20,
                'likes_count' => 85,
            ],
        ];

        return view('frontend.blogs.index', compact('blogs'));
    }

    public function show()
    {
        return view('frontend.blogs.show');
    }
}
