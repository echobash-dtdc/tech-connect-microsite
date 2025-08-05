<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Core\Services\BaseRow\HomePageServices;
use App\Core\Services\BaseRow\ReleaseNoteServices;

class HomeController extends Controller
{
    private HomePageServices $homePageServices;
    private ReleaseNoteServices $releaseNoteServices;

    public function __construct()
    {
        $this->homePageServices = new HomePageServices();
        $this->releaseNoteServices = new ReleaseNoteServices();
    }
    public function index()
    {
        $leadershipMessage = $this->homePageServices->getActiveLeadershipMessage();
        $releaseNotes = $this->releaseNoteServices->getAllReleaseNotes();
        return view('frontend.index', compact('leadershipMessage', 'releaseNotes'));
    }

}
