<?php

namespace App\Http\Controllers\AdminCP\SpaManagementSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminCPModel\SpaManagementSystem\CustomerBooking;
use App\AdminCPModel\SpaManagementSystem\Customer;
use App\AdminCPModel\SpaManagementSystem\Services;
use App\AdminCPModel\SpaManagementSystem\CustomerBookingDetail;
use App\AdminCPModel\SpaManagementSystem\Staff;
class CustomerBookingController extends Controller
{
	public function showCustomer(){
		$customerBookingDetail = CustomerBookingDetail::all();
		$customerBooking = CustomerBooking::all();
    	// $customerBookingDetail = CustomerBookingDetail::where')
    	return view('admincp.spamanasys.CustomerBooking.ListCustomer',compact('customerBooking','customerBookingDetail'));
    }

    public function showDetail($idCustomer){
    	$customerBooking = CustomerBooking::find($idCustomer);
    	$customer = Customer::find($customerBooking->CustomerId);
    	$services = CustomerBookingDetail::where('CustomerBookingId','=',$idCustomer)->get();
    	return view('admincp.spamanasys.CustomerBooking.ViewDetail',compact('customerBooking','customer','services'));
    }

    public function showFormEditDetail($idCustomer){
    	$customerBooking = CustomerBooking::find($idCustomer);
    	$customer = Customer::find($customerBooking->CustomerId);
    	$servicesSelected = CustomerBookingDetail::where('CustomerBookingId','=',$idCustomer)->get();
    	$listServices = Services::all();
    	// $staffWorking = Staff::where('StaffActive','',0)->get();
    	$listStaff = Staff::where('StaffActive','=',0)->get();
    	return view('admincp.spamanasys.CustomerBooking.frmEditDetail',compact('customerBooking','customer','servicesSelected','staffWorking','listStaff','listServices'));
    }
}
