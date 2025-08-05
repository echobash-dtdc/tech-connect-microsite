<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Core\Services\BaseRow\ReleaseNoteServices;

class ReleaseNotesController extends Controller
{
    private ReleaseNoteServices $releaseNoteService;
    public function __construct()
    {
        $this->releaseNoteService = new ReleaseNoteServices();
    }
    public function show(string $slug)
    {
        $releaseNote = $this->releaseNoteService->getReleaseNoteBySlug($slug);
        if (!$releaseNote) {
            abort(404);
        }
        // dd($releaseNote); // Debugging line to inspect the release note data
        return view('frontend.release_notes.show', compact('releaseNote'));
    }
}
