<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Core\Services\BaseRow\FeedbackFormApiServices;

class FeedBackController extends Controller
{
    private FeedbackFormApiServices $feedbackFormApiServices;
    public function __construct()
    {
        $this->feedbackFormApiServices = new FeedbackFormApiServices();
    }
    public function create()
    {
        $topics = $this->feedbackFormApiServices->getFeedbackTopics();
        return view('frontend.feedback', compact('topics'));
    }

}
