<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Core\Services\BaseRow\HomePageServices;

class HomeController extends Controller
{
    private HomePageServices $homePageServices;
    public function __construct()
    {
        $this->homePageServices = new HomePageServices();
    }
    public function index()
    {
        $leadershipMessage = $this->homePageServices->getActiveLeadershipMessage();
        return view('frontend.index', compact('leadershipMessage'));
    }

}
