<?php

namespace App\Http\Controllers\AdminCP\SpaManagementSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\AdminCPModel\SpaManagementSystem\Room;
use App\AdminCPModel\SpaManagementSystem\Services;
use App\AdminCPModel\SpaManagementSystem\Staff;
use App\AdminCPModel\SpaManagementSystem\CustomerBooking;
use App\AdminCPModel\SpaManagementSystem\ListServices;
use App\AdminCPModel\SpaManagementSystem\Customer;
use App\AdminCPModel\SpaManagementSystem\CustomerBookingDetail;

class BookingForCustomerController extends Controller
{
    public function showBooking(){
    	$room = Room::where('RoomTypeId', '>', 1)->get();
    	$services = Services::all(); 
    	$staff = Staff::where('StaffActive', 0)->get(); 
    	return view('admincp.spamanasys.BookingForCustomer.Booking',compact('room','services','staff'));
    }

    public function booking(Request $request){
		$this->validate($request,
			[
				'CustomerName' 			=> 'required',
				'CustomerPhoneNumber'   => 'required | numeric',
				'gender'				=> 'required',
				'ServicesId' 			=> 'required_without_all',
				'StaffId' 				=> 'required',
				'RoomId' 				=> 'required',
			],
			[
				'required' => 'Bạn chưa nhập thông tin :attribute ',
				'CustomerPhoneNumber.numeric' => 'Số điện thoại phải là số',
				'ServicesId.required_without_all' => 'Phải chọn ít nhất 1 dịch vụ',
 			],
			[
				'CustomerName' 			=> 'tên khách hàng',
				'CustomerPhoneNumber'   => 'số điện thoại khách hàng',
				'ServicesId' 			=> 'dịch vụ',
				'StaffId' 				=> 'nhân viên tiếp nhận',
				'RoomId' 				=> 'phòng tiếp nhận',
				'gender'				=> 'giới tính,'
			]
		);

		$checkpassRoom     	 	= false;
		$checkpassStaff    	 	= false;
		$checkpassCustomer 	 	= false;
		$checkpassBooking  	 	= false;
		$checkpassBookingDetail = false;

		$idCustomerBooking;
		$idCustomer;
		/*
			handling spsm_room table
		*/
		$room = Room::find($request['RoomId']);
		if($room->RoomBlank <= 0){
			return redirect()->back()->withInput()->withErrors('Phòng vừa chọn đã hết chỗ trống');
		}
		else{
			$room->RoomBlank -= 1;
			$checkpassRoom = $room->save();
		}

		/*
			handling spsm_staff table
		*/
		if($checkpassRoom == true ){		
	    	$staff = Staff::find($request['StaffId']);
	    	if($staff->StaffActive ==  0){
	    		$staff->StaffActive = 1;
	    		$staff->StaffWorkAtRoom = $request['RoomId'];
	    		$checkpassStaff = $staff->save();
	    	}
	    	else if($staff->StaffActive ==  1){
	    		return redirect()->back()->withInput()->withErrors('Nhân viên '.$staff->StaffName.' đang làm việc ở phòng khác');
	    	}
	    	else{
	    		return redirect()->back()->withInput()->withErrors('Nhân viên '.$staff->StaffName.' đang làm việc ở phòng khác');
	    	}
		}

		/*
			handling spsm_customer table
		*/
		if($checkpassStaff == true){
			$customer = new Customer();
	    	$customer->CustomerName = $request['CustomerName'];
	    	$customer->CustomerPhoneNumber = $request['CustomerPhoneNumber'];
	    	$customer->CustomerGender = $request['gender'];
			$checkpassCustomer = $customer->save();
			$customer->save();
			$idCustomer = $customer->CustomerId;
		}
		
		/*	
			handling spsm_customerbooking table
		*/
		if($checkpassCustomer == true){
    		$customerBooking = new CustomerBooking();
    		$customerBooking->CustomerId = $idCustomer;

    		$customerBooking->RoomId = $request['RoomId'];
    		$customerBooking->StaffId = $request['StaffId'];
	    	$checkpassBooking = $customerBooking->save();
			$idCustomerBooking = $customerBooking->CustomerBookingId;
		}

		/*
			handling spsm_listservices table
		*/
		if($checkpassBooking == true){
			if(sizeof($request['ServicesId']) > 1){
				for($i = 0; $i < sizeof($request['ServicesId']); $i++){
    				$CustomerBookingDetail = new CustomerBookingDetail();
					$CustomerBookingDetail->CustomerBookingId = $idCustomerBooking;
					$CustomerBookingDetail->ServicesId = $request['ServicesId'][$i];
					$checkpassBookingDetail = $CustomerBookingDetail->save();
				}
			}
			else{
				$CustomerBookingDetail = new CustomerBookingDetail();
				$CustomerBookingDetail->CustomerBookingId = $idCustomerBooking;
				$CustomerBookingDetail->ServicesId = $request['ServicesId'][0];
				$checkpassBookingDetail = $CustomerBookingDetail->save();
			}
		}

		

		if($checkpassBookingDetail == true){
			return back()->with('success_message','Đăng ký dịch vụ cho khách hàng '.$request['CustomerName'].' thành công');
		}
    }

}
