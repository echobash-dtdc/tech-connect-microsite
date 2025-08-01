<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Core\Services\BaseRow\FeedbackFormServices;

class FeedBackController extends Controller
{
    private FeedbackFormServices $feedbackFormServices;
    public function __construct()
    {
        $this->feedbackFormServices = new FeedbackFormServices();
    }
    public function create()
    {
        $feedbackType = $this->feedbackFormServices->getFeedbackType();
        return view('frontend.feedbacks.index', compact('feedbackType'));
    }
    public function saveFeedbackFormData()
    {
        $data = request()->all();
        $result = $this->feedbackFormServices->saveFeedbackFormData($data);
        return response()->json($result);
    }
}
