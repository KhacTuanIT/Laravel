<?php

namespace App\Http\Controllers\AdminCP\SpaManagementSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminCPModel\SpaManagementSystem\Room;
use App\AdminCPModel\SpaManagementSystem\Services;
use App\AdminCPModel\SpaManagementSystem\Staff;
use App\AdminCPModel\SpaManagementSystem\CustomerBooking;
class DashboardController extends Controller
{
    public function showDashBoard(){
    	$room = Room::where('RoomTypeId', '>', 1)->get();
    	// $listServices = ListServices::all(); 
    	// $listStaff = ListStaff::where('StaffActive', 0)->get(); 
    	// $listRoom = ListRoom::all();
    	$services = Services::all(); 
    	$staff = Staff::all();
    	$customerBooking = CustomerBooking::all();
    	//overview Spa 
    	$ovvStaffActive = Staff::where('StaffActive',1)->get()->count();
    	$ovvNumberStaff = Staff::all()->count();
        // $percentActiveStaff = floor($ovvNumberStaff /$ovvStaffActive);
    	$percentActiveStaff = 5;

    	return view('admincp.spamanasys.Dashboard.dashboard',[
    		'room' 		      => $room,
    		'services'        => $services,
    		'staff'		      => $staff,
    		'customerBooking' => $customerBooking,
    		'ovvStaffActive'  => $ovvStaffActive,
    		'percentActiveStaff' => $percentActiveStaff,
    	]);

    }
}
