<?php

namespace App\Http\Controllers\AdminCP\SpaManagementSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminCPModel\SpaManagementSystem\ListRoom;
use App\AdminCPModel\SpaManagementSystem\ListServices;
use App\AdminCPModel\SpaManagementSystem\ListStaff;
use App\AdminCPModel\SpaManagementSystem\CustomerBooking;
class DashboardController extends Controller
{
    public function showDashBoard(){
    	$listRoom = ListRoom::where('RoomType', '>', 1)->get();
    	// $listServices = ListServices::all(); 
    	// $listStaff = ListStaff::where('StaffActive', 0)->get(); 
    	// $listRoom = ListRoom::all();
    	$listServices = ListServices::all(); 
    	$listStaff = ListStaff::all(); 
    	$customerBooking = CustomerBooking::all();
    	return view('admincp.spamanasys.Dashboard.dashboard',compact('listRoom','listServices','listStaff','customerBooking'));

    }
}
