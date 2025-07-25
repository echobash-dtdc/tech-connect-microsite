<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Core\Services\BaseRow\BlogServices;

class BlogController extends Controller
{
    private BlogServices $blogService;
    public function __construct()
    {
        $this->blogService = new BlogServices();
    }
    public function index()
    {
        $blogs = $this->blogService->getAllBlog();
        return view('frontend.blogs.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = $this->blogService->getBlogById($id);
        if (!$blog) {
            abort(404);
        }
        return view('frontend.blogs.show', compact('blog'));
    }
}
