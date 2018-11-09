<?php

namespace App\Http\Controllers\AdminCP\SpaManagementSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function showDashBoard(){
    	return view('admincp.spamanasys.dashboard.dashboard');
    }
}
