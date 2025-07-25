<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Core\Services\BaseRow\ProjectServices;

class ProjectController extends Controller
{
    private ProjectServices $projectServices;
    public function __construct()
    {
        $this->projectServices = new ProjectServices();
    }
    public function index()
    {
        $projects = $this->projectServices->getAllProjects();
        return view('frontend.projects.index', compact('projects'));
    }

    public function show($id)
    {
        $project = $this->projectServices->getProjectById($id);
        if (!$project) {
            abort(404);
        }
        return view('frontend.projects.show', compact('project'));
    }
}
