<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

class OrganisationStructureController extends Controller
{
    public function index()
    {
        return view('frontend.organisation_structure.index');
    }

}
