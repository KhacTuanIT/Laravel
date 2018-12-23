<?php

namespace App\Http\Controllers\Spacms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CmsSpa\Feedback;

class FeedbackcmsController extends Controller
{
    public function getFeedbackCms() {
    	$feedbacks = Feedback::all();
    	return view('spa.spacms.feedback.feedback',compact('feedbacks'));
    }
}
