<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Core\Services\BaseRow\EventServices;

class EventController extends Controller
{
    private EventServices $eventService;
    public function __construct()
    {
        $this->eventService = new EventServices();
    }
    public function index()
    {
        $page = request()->query('page', 1);
        $pageSize = 10; // Default page size
        $eventData = $this->eventService->getAllEvents($page, $pageSize);
        $events = $eventData['results'];
        $total = $eventData['count'];
        $currentPage = $eventData['page'];
        $pageSize = $eventData['pageSize'];
        $lastPage = (int) ceil($total / $pageSize);
        return view('frontend.events', compact('events', 'total', 'currentPage', 'pageSize', 'lastPage'));
    }
}
