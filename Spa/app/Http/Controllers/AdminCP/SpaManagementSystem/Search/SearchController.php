<?php

namespace App\Http\Controllers\AdminCP\SpaManagementSystem\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminCPModel\SpaManagementSystem\Customer;
use App\AdminCPModel\SpaManagementSystem\CustomerMember;
use App\AdminCPModel\SpaManagementSystem\Services;
use App\AdminCPModel\SpaManagementSystem\CustomerBookingDetail;
use App\AdminCPModel\SpaManagementSystem\CustomerBooking;
use App\AdminCPModel\SpaManagementSystem\Staff;
use App\AdminCPModel\SpaManagementSystem\Room;
class SearchController extends Controller
{
    public function showSearch(){
    	$listStaff = Staff::all();
    	return view('admincp.spamanasys.Search.Search',
		[
			'listStaff' => $listStaff,
		]);
    }
    
    public function searchStaff(){
        $staff = Staff::paginate(3);
        return view('admincp.spamanasys.Search.SearchStaff',compact('staff'));
    }

    public function searchCustomerMember(){
		$listCustomerMember = CustomerMember::all();
    	return view('admincp.spamanasys.Search.SearchCustomerMember',compact('listCustomerMember'));
    }

    public function searchRoom(){
        $room = Room::where("RoomId",">",1)->get();
        return view('admincp.spamanasys.Search.SearchRoom',compact('room'));
    }
}
