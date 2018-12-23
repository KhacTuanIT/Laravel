<?php

namespace App\Http\Controllers\AdminCP\SpaManagementSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminCPModel\SpaManagementSystem\Customer;
use App\AdminCPModel\SpaManagementSystem\Services;
use App\AdminCPModel\SpaManagementSystem\CustomerBookingDetail;
use App\AdminCPModel\SpaManagementSystem\CustomerBooking;
use App\AdminCPModel\SpaManagementSystem\Staff;
use App\AdminCPModel\SpaManagementSystem\Room;
class Search extends Controller
{
    public function showSearch(){
    	$customerBookingDetail = CustomerBookingDetail::all();
		$customerBooking = CustomerBooking::all();
    	return view('admincp.spamanasys.Search.Search',
		[
			'customerBookingDetail' => $customerBookingDetail,
			'customerBooking' => $customerBooking,
		]);
    }
    
    public function searchStaff(){
        $staff = Staff::paginate(3);
        return view('admincp.spamanasys.Search.SearchStaff',compact('staff'));
    }

    public function searchCustomer(){
		$customer = Customer::all();
    	return view('admincp.spamanasys.Search.SearchCustomer',compact('customer'));
    }

    public function searchRoom(){
        $room = Room::where("RoomId",">",1)->get();
        return view('admincp.spamanasys.Search.SearchRoom',compact('room'));
    }


}
