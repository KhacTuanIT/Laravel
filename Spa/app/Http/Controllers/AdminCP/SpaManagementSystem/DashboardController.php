<?php

namespace App\Http\Controllers\AdminCP\SpaManagementSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminCPModel\SpaManagementSystem\Room;
use App\AdminCPModel\SpaManagementSystem\Services;
use App\AdminCPModel\SpaManagementSystem\Staff;
use App\AdminCPModel\SpaManagementSystem\CustomerBooking;
use App\AdminCPModel\SpaManagementSystem\Customer;
use App\AdminCPModel\SpaManagementSystem\CustomerMember;
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
        $ovvNumberCustomerMember = CustomerMember::all()->count();
        // $percentActiveStaff = floor($ovvNumberStaff /$ovvStaffActive);
    	$percentActiveStaff = 5;

    	return view('admincp.spamanasys.Dashboard.dashboard',[
    		'room' 		      => $room,
    		'services'        => $services,
    		'staff'		      => $staff,
    		'customerBooking' => $customerBooking,
    		'ovvStaffActive'  => $ovvStaffActive,
            'ovvNumberStaff' => $ovvNumberStaff,
            'ovvNumberCustomer' => $customerBooking->count(),
    		'ovvNumberCustomerMember' => $ovvNumberCustomerMember,
    	]);

    }

    public function ajaxViewRoom(Request $request){
        if($request->ajax()){
            $room = Room::find($request['idRoom']);
            $staff = Staff::all();
            $customerBooking = CustomerBooking::where('RoomId','=',$request['idRoom'])->get();
            //Add key/value to JSON Object
            foreach ($customerBooking as $key => $value) {
                $customerBooking[$key]['CustomerName'] = NULL;
            }

            foreach ($customerBooking as $key => $value) {
                if($customerBooking[$key]->CustomerMember == 0){
                    $customerBooking[$key]->CustomerName = Customer::where("CustomerId","=",$customerBooking[$key]->CustomerId)->value('CustomerName');
                }
                if($customerBooking[$key]->CustomerMember == 1){
                    $customerBooking[$key]->CustomerName = CustomerMember::where("CustomerMemberId","=",$customerBooking[$key]->CustomerId)->value("CustomerMemberName");
                }
                foreach ($staff as $keySF => $valueSF) {
                    if($customerBooking[$key]->StaffId == $valueSF->StaffId)
                        $customerBooking[$key]->StaffId = $valueSF->StaffName;
                }
            }
            return response()->json(
                array(
                    "listRoom" => $room,
                    "customerBooking" => $customerBooking,
                        // 'customer' => $customer,
                        // 'customerMember' => $customerMember,
                ),200
            );
        }

    }

    public function responseJsonListStaff(){
        $listStaff = Staff::all();
        foreach ($listStaff as $key => $value) {
            if($value->StaffActive == 0){
                $value->StaffActive = '<span style="width: 110px;"><span class="m-badge m-badge--success m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-success">Rãnh</span></span>';
            }
            else{
                $value->StaffActive = '<span style="width: 110px;"><span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">Làm việc</span></span>';
            }
            $value->StaffWorkAtRoom = $value->getRoom->RoomName;
        }
        // var_dump($listStaff);
        // $listStaffArr = array();
        // foreach ($listStaff as $key => $value) {
        //     $listStaffArr[$key]['StaffName'] = $value->StaffName;
        //     $listStaffArr[$key]['StaffPhoneNumber'] = $value->StaffPhoneNumber;
        //     $listStaffArr[$key]['StaffGender'] = $value->StaffGender;
        //     $listStaffArr[$key]['StaffActive'] = $value->StaffGender;
        // }
        return response()->json($listStaff);

    }
}
