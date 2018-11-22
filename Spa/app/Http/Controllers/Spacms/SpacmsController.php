<?php

namespace App\Http\Controllers\Spacms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpacmsController extends Controller
{
    public function getDashboard() {
    	return view('spa.spacms.dashboard.dashboard');
    }
}
