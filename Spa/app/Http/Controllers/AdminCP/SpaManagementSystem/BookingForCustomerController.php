<?php

namespace App\Http\Controllers\AdminCP\SpaManagementSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\AdminCPModel\SpaManagementSystem\ListRoom;
use App\AdminCPModel\SpaManagementSystem\ListServices;
use App\AdminCPModel\SpaManagementSystem\ListStaff;
use App\AdminCPModel\SpaManagementSystem\CustomerBooking;
class BookingForCustomerController extends Controller
{
    public function showBooking(){
    	$listRoom = ListRoom::where('RoomType', '>', 1)->get();
    	$listServices = ListServices::all(); 
    	$listStaff = ListStaff::where('StaffActive', 0)->get(); 
    	return view('admincp.spamanasys.BookingForCustomer.booking',compact('listRoom','listServices','listStaff'));
    }

    public function booking(Request $request){
		$this->validate($request,
			[
				'CustomerName' 			=> 'required',
				'CustomerPhoneNumber'   => 'required | numeric',
				'ServicesId' 			=> 'required',
				'StaffId' 				=> 'required',
				'RoomId' 				=> 'required',
			],
			[
				'required' => 'Bạn chưa nhập thông tin :attribute ',
				'CustomerPhoneNumber.numeric' => 'Số điện thoại phải là số'
 			],
			[
				'CustomerName' 			=> 'tên khách hàng',
				'CustomerPhoneNumber'   => 'số điện thoại khách hàng',
				'ServicesId' 			=> 'dịch vụ',
				'StaffId' 				=> 'nhân viên tiếp nhận',
				'RoomId' 				=> 'phòng tiếp nhận',
			]
		);

		$checkpassRoom    = false;
		$checkpassStaff   = false;
		$checkpassBooking = false;

		/*
			handling spsm_room table
		*/
		$room = ListRoom::find($request['RoomId']);
		if($room->RoomBlank <= 0){
			// withErrors(['msg', 'The Message']
			return redirect()->back()->withInput()->withErrors('Phòng vừa chọn đã hết chỗ trống');
		}else{
			$room->RoomBlank -= 1;
			$checkpassRoom = $room->save();
		}

		/*
			handling spsm_staff table
		*/
		if($checkpassRoom == true ){		
	    	$staff = ListStaff::find($request['StaffId']);
	    	if($staff->StaffActive ==  1){
	    		return redirect()->back()->withInput()->withErrors('Nhân viên '.$staff->StaffName.' đang làm việc ở phòng khác');
	    	}
	    	if($staff->StaffActive ==  0){
	    		$staff->StaffActive = 1;
	    		$staff->StaffWorkAtRoomId = $request['RoomId'];
	    		$checkpassStaff = $staff->save();
	    	}
		}

		/*
			handling spsm_customerbooking table
		*/
		if($checkpassStaff == true){
    		$customerBooking = new CustomerBooking();
    		$customerBooking->RoomId = $request['RoomId'];
    		$customerBooking->ServicesId = $request['ServicesId'];
    		$customerBooking->StaffId = $request['StaffId'];
	    	$customerBooking->CustomerName = $request['CustomerName'];
	    	$customerBooking->CustomerPhoneNumber = $request['CustomerPhoneNumber'];
	    	// $customerBooking->CustomerBookingTime = Carbon::now();
	    	// $customerBooking->updated_at = timestamps('updated_at');
	    	$customerBooking->save();
		}
		if($customerBooking == true){
			return back()->with('success_message','Đăng ký dịch vụ cho khách hàng '.$request['CustomerName'].' thành công');
		}
    }

}
