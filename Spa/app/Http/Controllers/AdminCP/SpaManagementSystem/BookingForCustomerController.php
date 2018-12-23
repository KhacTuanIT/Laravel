<?php

namespace App\Http\Controllers\AdminCP\SpaManagementSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\AdminCPModel\SpaManagementSystem\Room;
use App\AdminCPModel\SpaManagementSystem\Services;
use App\AdminCPModel\SpaManagementSystem\Staff;
use App\AdminCPModel\SpaManagementSystem\CustomerBooking;
use App\AdminCPModel\SpaManagementSystem\ListServices;
use App\AdminCPModel\SpaManagementSystem\Customer;
use App\AdminCPModel\SpaManagementSystem\CustomerMember;
use App\AdminCPModel\SpaManagementSystem\CustomerBookingDetail;
use App\AdminCPModel\SpaManagementSystem\HistoryMember;
use App\AdminCPModel\SpaManagementSystem\HistoryMemberDetail;
use App\Http\Controllers\AdminCP\SpaManagementSystem\SessionTableHandleController;

class BookingForCustomerController extends Controller
{
    public function showBooking(){
    	$roomAvailable = Room::where('RoomId','>',1)->whereBetween('RoomBlank',array(1,1000))->get();
        $allRoom = Room::where('RoomId','>',1)->get();
    	$services = Services::all(); 
    	$staff = Staff::where('StaffActive', 0)->get(); 
    	return view('admincp.spamanasys.BookingForCustomer.Booking',compact('services','staff','roomAvailable','allRoom'));
    }

    public function ajaxPriceServices(Request $request){
    	$services = Services::find($request['idServices']);
    	// $services->ServicesPrice = number_format($services->ServicesPrice,0,",","."); 
    	return response()->json($services,200);
    }

    public function searchCustomerMember(Request $request){
    	if($request->ajax()){	
    		$this->validate($request,
    			[
    				'CustomerPhoneSearch' 	=> 'required | numeric',
    			],
    			[
    				'CustomerPhoneSearch.required' => 'Bạn chưa nhập số điện thoại',
    				'CustomerPhoneSearch.numeric' => 'Số điện thoại không hợp lệ',
    			]
    		);


            $customerId = CustomerMember::where("CustomerMemberPhoneNumber","=",$request['CustomerPhoneSearch'])->value('CustomerMemberId');

            if(CustomerMember::where("CustomerMemberPhoneNumber","=",$request['CustomerPhoneSearch'])->exists()) {
                $customerMember = CustomerMember::where("CustomerMemberPhoneNumber","=",$request['CustomerPhoneSearch'])->first();
                if(CustomerBooking::where("CustomerId","=",$customerMember->CustomerMemberId)->exists()){
                    return response()->json(
                        array(
                            "CustomerPhoneSearch" => "Khách ".$customerMember->CustomerMemberName." đang sử dụng dịch vụ trong spa, Vui lòng cập nhật dịch vụ cho khách hàng",
                        ),422
                    );
                }
                else{
                    return response()->json(
                        array(
                            "message" => "Tìm kiếm thành công khách hàng ".$customerMember['CustomerMemberName'],
                            "CustomerMemberId" => $customerMember['CustomerMemberId'],
                            "CustomerMemberName" => $customerMember['CustomerMemberName'],
                            "CustomerMemberPhoneNumber" => $customerMember['CustomerMemberPhoneNumber'],
                            "CustomerMemberGender" => $customerMember['CustomerMemberGender'],
                        )
                    );
                }
            }

    		else{
    			return response()->json(
    				array(
    					"CustomerPhoneSearch" => "Không tìm thấy khách hàng thành viên",
    				),422
    			);
    		}
    	}
    }

    public function searchTableCustomerMember(Request $request){
    	$this->validate($request,
    		[
    			'CustomerPhoneNumberTable' 	=> 'required | numeric',
    		],
    		[
    			'CustomerPhoneNumberTable.required' => 'Bạn chưa nhập số điện thoại',
    			'CustomerPhoneNumberTable.numeric' => 'Số điện thoại không hợp lệ',
    		]
    	);

    	if(CustomerMember::where("CustomerMemberPhoneNumber","=",$request['CustomerPhoneNumberTable'])->exists()) {
    			$customerMember = CustomerMember::where("CustomerMemberPhoneNumber","=",$request['CustomerPhoneNumberTable'])->get();		
    			$customerMember = $customerMember[0];

    			// $idHistoryMember = $customerMember->
    			$historyMember = HistoryMember::where("CustomerMemberId","=",$customerMember->CustomerMemberId)->first();
    			$historyMemberDetail = HistoryMemberDetail::where("CustomerMemberId","=",$customerMember->CustomerMemberId)->take(10)->get();
    			
    			//MODIFY RESPONSE DATA
    			$historyMember = HistoryMember::all();
    			foreach ($historyMember as $key => $value) {
    				$historyMember[$key]->BookingTime = date("H:s \\N\g\à\y\ d-m-Y",strtotime($historyMember[$key]->BookingTime));
    			}
    			

    			$listSV = Services::all();	
    			foreach ($historyMemberDetail as $keyCusBookDet => $valueCusBookDet) {
    				foreach ($listSV as $keySV => $valueSV) {
    					if($valueCusBookDet->ServicesId == $valueSV->ServicesId){
    						$historyMemberDetail[$keyCusBookDet]['ServicesId'] = $valueSV->ServicesName;
    					}	
    				}
    			}

    			// return response()->json($customerMember,$historyMember,$historyMemberDetail,200);
    			return response()->json(array
    				('customerMember' => $customerMember,
					'historyMember' => $historyMember,
					'historyMemberDetail' => $historyMemberDetail)
    				,200);
    	}
    	else{
    		return response()->json(
    			array(
    				"CustomerPhoneSearch" => "Không tìm thấy khách hàng thành viên",
    			),422
    		);
    	}
    }

    public function jsonShowInfoCusMember($CustomerPhoneNumber){
    	$customerMemberId = CustomerMember::where('CustomerMemberPhoneNumber','=',$CustomerPhoneNumber)->value('CustomerMemberId');
    	$listServices = Services::all();
    	$historyMember = HistoryMember::where('CustomerMemberId','=',$customerMemberId)->get();
    	$historyMemberDetail = HistoryMemberDetail::where('customerMemberId','=',$customerMemberId)->get();
    	foreach ($historyMemberDetail as $keyHMD => $valueHistoryMemberDetail) {
    		foreach ($listServices as $keySV => $valueListServices) {
    			if($valueHistoryMemberDetail->ServicesId == $valueListServices->ServicesId){
    				$historyMemberDetail[$keyHMD]->ServicesId = $valueListServices->ServicesName;
    			}    			
    			
    		}
    	}
    	foreach ($historyMemberDetail as $keyHMD => $valueHMD) {
    		foreach ($historyMember as $keyHM => $valueHM) {
    			if($valueHMD->HistoryMemberId == $valueHM->HistoryMemberId){
    				$historyMemberDetail[$keyHMD]->HistoryMemberId = date("H:s \\N\g\à\y\ d-m-Y",strtotime($valueHM->BookingTime));
    			}
    		}
    	}
    	return response()->json($historyMemberDetail);
    }

    public function responseSessionToListCustomer(){
        return session()->put('sttCustomer',"new");
    }

    public function bookingCustomer(SessionTableHandleController $sessionTable,Request $request){
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

    	DB::beginTransaction();
    	try {

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
				$room->save();
			}

		/*
			handling spsm_staff table
		*/
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

		/*
			handling spsm_customer table
		*/
			$customer = new Customer();
            $idCustomer = "KVL".rand(1, 1000000);
            $customer->CustomerId = $idCustomer;
			$customer->CustomerName = $request['CustomerName'];
			$customer->CustomerPhoneNumber = $request['CustomerPhoneNumber'];
			$customer->CustomerGender = $request['gender'];
			$checkpassCustomer = $customer->save();
			if($checkpassCustomer == true){
				Staff::where('StaffId',$request['StaffId'])->update(['StaffWorkAtCus'=> $idCustomer]);
			}

		/*	
			handling spsm_customerbooking table
		*/
			$customerBooking = new CustomerBooking();
			$customerBooking->CustomerMember = 0;
			$customerBooking->CustomerId = $idCustomer;
			$customerBooking->RoomId = $request['RoomId'];
			$customerBooking->StaffId = $request['StaffId'];
			$checkpassBooking = $customerBooking->save();
			$idCustomerBooking = $customerBooking->CustomerBookingId;

		/*
			handling spsm_listservices table
		*/
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

			DB::commit();
            // $this->responseSessionToListCustomer();
            $sessionTable->setSessionCustomer();
            $sessionTable->setSessionStaff();
            return back()->with('success_message','Đăng ký dịch vụ cho khách hàng '.$request['CustomerName'].' thành công');
		}
		catch(\Illuminate\Database\QueryException $e){
			DB::rollback();
			return redirect()->back()->withInput()->withErrors('Chỉnh sửa không thành công lỗi ==>'.$e->getMessage());
		}

		
    }

    public function bookingCustomerMember(SessionTableHandleController $sessionTable, Request $request){
		$this->validate($request,
			[
				'CustomerMemberId' 		=> 'required',
				'ServicesId2' 			=> 'required_without_all',
				'StaffId2' 				=> 'required',
				'RoomId' 				=> 'required',
			],
			[
                'required' => 'Bạn chưa nhập thông tin :attribute ',
				'CustomerMemberId.required' => 'Bạn chưa nhập thông tin khách hàng thành viên',
				'ServicesId2.required_without_all' => 'Phải chọn ít nhất 1 dịch vụ',
 			],
			[
				'CustomerMemberId' 		=> 'mã khách hàng',
				'ServicesId2' 			=> 'dịch vụ',
				'StaffId2' 				=> 'nhân viên tiếp nhận',
				'RoomId' 				=> 'phòng tiếp nhận',
			]
		);

		$idCustomerBooking;
		$idCustomer;
		
        // if()


		/*
			handling spsm_room table
		*/
		DB::beginTransaction();
        try{
        	$room = Room::find($request['RoomId']);
        	if($room->RoomBlank <= 0){
        		return redirect()->back()->withInput()->withErrors('Phòng vừa chọn đã hết chỗ trống');
        	}
        	else{
        		$room->RoomBlank -= 1;
        		$room->save();
        	}

		/*
			handling spsm_staff table
		*/
			$staff = Staff::find($request['StaffId2']);
			if($staff->StaffActive ==  0){
				$staff->StaffActive = 1;
				$staff->StaffWorkAtRoom = $request['RoomId'];
				$staff->StaffWorkAtCus = $request['CustomerMemberId'];;
				$staff->save();
			}
			else if($staff->StaffActive ==  1){
				return redirect()->back()->withInput()->withErrors('Nhân viên '.$staff->StaffName.' đang làm việc ở phòng khác');
			}
			else{
				return redirect()->back()->withInput()->withErrors('Nhân viên '.$staff->StaffName.' đang làm việc ở phòng khác');
			}


		/*	
			handling spsm_customerbooking table
		*/
			$customerBooking = new CustomerBooking();
			$customerBooking->CustomerMember = 1;
			$customerBooking->CustomerId = $request['CustomerMemberId'];
			$customerBooking->RoomId = $request['RoomId'];
			$customerBooking->StaffId = $request['StaffId2'];
			$checkpassBooking = $customerBooking->save();
			$idCustomerBooking = $customerBooking->CustomerBookingId;
			
		/*
			handling spsm_listservices table
		*/
			if(sizeof($request['ServicesId2']) > 1){
				for($i = 0; $i < sizeof($request['ServicesId2']); $i++){
					$CustomerBookingDetail = new CustomerBookingDetail();
					$CustomerBookingDetail->CustomerBookingId = $idCustomerBooking;
					$CustomerBookingDetail->ServicesId = $request['ServicesId2'][$i];
					$checkpassBookingDetail = $CustomerBookingDetail->save();
				}
			}
			else{
				$CustomerBookingDetail = new CustomerBookingDetail();
				$CustomerBookingDetail->CustomerBookingId = $idCustomerBooking;
				$CustomerBookingDetail->ServicesId = $request['ServicesId2'][0];
				$checkpassBookingDetail = $CustomerBookingDetail->save();
			}

			DB::commit();
            $sessionTable->setSessionCustomer();
            $sessionTable->setSessionStaff();
			return back()->with('success_message','Đăng ký dịch vụ cho khách hàng thành viên '.$request['CustomerName'].' thành công');
		}
		catch(\Illuminate\Database\QueryException $e){
			DB::rollback();
            return redirect()->back()->withInput()->withErrors('Chỉnh sửa không thành công lỗi ==>'.$e->getMessage());
		}

		
    }

}
