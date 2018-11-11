<?php

namespace App\Http\Controllers\AdminCP\SpaManagementSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminCPModel\SpaManagementSystem\ListRoom;
use App\AdminCPModel\SpaManagementSystem\ListServices;
use App\AdminCPModel\SpaManagementSystem\ListStaff;
class BookingForCustomerController extends Controller
{
    public function showBooking(){
    	$listRoom = ListRoom::all(); 
    	$listServices = ListServices::all(); 
    	$listStaff = ListStaff::where('StaffActive', 0)->get(); 
    	return view('admincp.spamanasys.BookingForCustomer.Booking',compact('listRoom','listServices','listStaff'));
    }
}
