<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Core\Services\BaseRow\HomePageServices;
use App\Core\Services\BaseRow\ReleaseNoteServices;
use App\Core\Services\BaseRow\BlogServices;

class HomeController extends Controller
{
    private HomePageServices $homePageServices;
    private ReleaseNoteServices $releaseNoteServices;
    private BlogServices $blogServices;

    public function __construct()
    {
        $this->homePageServices = new HomePageServices();
        $this->releaseNoteServices = new ReleaseNoteServices();
        $this->blogServices = new BlogServices();
    }
    public function index()
    {
        $leadershipMessage = $this->homePageServices->getActiveLeadershipMessage();
        $releaseNotes = $this->releaseNoteServices->getAllReleaseNotes();
        $blogs = $this->blogServices->getLatestBlogs(3);
        return view('frontend.home.index', compact('leadershipMessage', 'releaseNotes', 'blogs'));
    }
}
