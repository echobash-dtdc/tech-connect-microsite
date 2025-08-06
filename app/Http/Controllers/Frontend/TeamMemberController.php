<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Core\Services\BaseRow\TeamServices;

class TeamMemberController extends Controller
{
    private TeamServices $teamServices;
    public function __construct()
    {
        $this->teamServices = new TeamServices();
    }
    public function index()
    {
        $teamMembers = $this->teamServices->getAllTeamMembers();
        return view('frontend.team_members.index2', compact('teamMembers'));
    }
}
