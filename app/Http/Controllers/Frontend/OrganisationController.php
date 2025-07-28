<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Core\Services\BaseRow\OrganisationServices;

class OrganisationController extends Controller
{
    private OrganisationServices $organisationServices;
    public function __construct()
    {
        $this->organisationServices = new OrganisationServices();
    }
    public function index()
    {
        $organisation = $this->organisationServices->getActiveOrganisation()['results'][0];
        // dd($organisation);
        return view('frontend.organisation.index', compact('organisation'));
    }
}
