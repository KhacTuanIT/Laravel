<?php

namespace App\Http\Controllers\AdminCP\SpaManagementSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Exception;
use App\rbException;
use Carbon\Carbon;
use App\AdminCPModel\SpaManagementSystem\CustomerBooking;
use App\AdminCPModel\SpaManagementSystem\Customer;
use App\AdminCPModel\SpaManagementSystem\CustomerMember;
use App\AdminCPModel\SpaManagementSystem\Services;
use App\AdminCPModel\SpaManagementSystem\CustomerBookingDetail;
use App\AdminCPModel\SpaManagementSystem\Staff;
use App\AdminCPModel\SpaManagementSystem\Room;
use App\Http\Controllers\AdminCP\SpaManagementSystem\SessionTableHandleController;

class CustomerBookingController extends Controller
{

	public function showCustomer(){
        $customerBookingDetail = CustomerBookingDetail::all();
        $customerBooking = CustomerBooking::all();
        // $customerBookingDetail = CustomerBookingDetail::where')
        // var_dump($customerBooking);
        // die();  
        return view('admincp.spamanasys.CustomerBooking.ListCustomer',compact('customerBooking','customerBookingDetail'));
    }

    public function showCustomer2(){
        $customerBooking = CustomerBooking::all();
		$room = Room::all();
        $listResponse;
        foreach ($customerBooking as $key => $value) {
            $listResponse[$key]['CustomerBookingId'] = $customerBooking[$key]->CustomerBookingId;
            if($value->CustomerMember == 1){
                $listResponse[$key]['CustomerMember'] = $value->CustomerMember;
                $listResponse[$key]['CustomerName'] = $value->getCustomerMember->CustomerMemberName;
                $listResponse[$key]['CustomerPhoneNumber'] = $value->getCustomerMember->CustomerMemberPhoneNumber;
            }
            else{
                $listResponse[$key]['CustomerMember'] = $value->CustomerMember;
                $listResponse[$key]['CustomerName'] = $value->getCustomer->CustomerName;
                $listResponse[$key]['CustomerPhoneNumber'] = $value->getCustomer->CustomerPhoneNumber;
            }
            $listResponse[$key]['RoomName'] = $value->getRoom->RoomName;
            $listResponse[$key]['BookingTime'] = $value->CustomerBookingTime->format("H:i d-m-Y");
        }
       return response([
        'data' => $listResponse
    ]);
 }

    public function showDetail($idCustomer){
    	$customerBooking = CustomerBooking::find($idCustomer);
        $customer = Customer::find($customerBooking->CustomerId);
    	$customerMember = CustomerMember::find($customerBooking->CustomerId);
    	$services = CustomerBookingDetail::where('CustomerBookingId','=',$idCustomer)->get();
        $roomAvailable = Room::where('RoomId','>',1)->whereBetween('RoomBlank',array(1,1000))->get();
        $allRoom = Room::where('RoomId','>',1)->get();
    	return view('admincp.spamanasys.CustomerBooking.ViewDetail',compact('customerBooking','customerMember','customer','services','roomAvailable','allRoom'));
    }

    public function showFormEditDetail($idCustomer){
    	$customerBooking = CustomerBooking::find($idCustomer);
    	$customer = Customer::find($customerBooking->CustomerId);
        $customerMember = CustomerMember::find($customerBooking->CustomerId);
        $listStaff;
        if($customerBooking->CustomerMember == 1){
            $listStaff = Staff::where('StaffActive','=',0)->orWhere('StaffWorkAtCus','=',$customerMember->CustomerMemberId)->get();
        }
        if($customerBooking->CustomerMember == 0){
        	$listStaff = Staff::where('StaffActive','=',0)->orWhere('StaffWorkAtCus','=',$customer->CustomerId)->get();
        }
        $servicesSelected = CustomerBookingDetail::where('CustomerBookingId','=',$idCustomer)->get();
        $listServices = Services::all();
        $room = Room::where('RoomId','>',1)->get();
        // $staffWorking = Staff::where('StaffActive','',0)->get();




    	


        return view('admincp.spamanasys.CustomerBooking.frmEditDetail',compact('customerBooking','customer','customerMember','servicesSelected','staffWorking','listStaff','listServices','room'));
    }

    public function editCustomer(SessionTableHandleController $sessionTable, Request $request){
        $this->validate($request,
            [
                'idCustomer'            => 'required |',
                'idCustomerBooking'     => 'required',
            ],
            [
                'required' => 'Bạn chưa nhập thông tin :attribute ',
            ],
            [
                'idCustomer'          => 'Mã khách hàng',
                'idCustomerBooking'   => 'Mã hoá đơn khách hàng',
            ]
        );
        $customer = Customer::find($request['idCustomer']);
        $customerBooking = CustomerBooking::find($request['idCustomerBooking']);
        if($customerBooking->CustomerMember == 1){
            $this->validate($request,
                [
                    'ServicesId'            => 'required_without_all',
                    'StaffId'               => 'required',
                    'RoomId'                => 'required',
                    'CustomerBookingTime'   => 'required',
                ],
                [
                    'required' => 'Bạn chưa nhập thông tin :attribute ',
                    'ServicesId.required_without_all' => 'Phải chọn ít nhất 1 dịch vụ',
                ],
                [
                    'StaffId'               => 'nhân viên tiếp nhận',
                    'RoomId'                => 'phòng tiếp nhận',
                    'CustomerBookingTime'   => 'Thời gian tiếp nhận',
                ]
            );
        }

        if($customerBooking->CustomerMember == 0){
            $this->validate($request,
                [
                    'CustomerName'          => 'required',
                    'CustomerPhoneNumber'   => 'required | numeric',
                    'gender'                => 'required',
                    'ServicesId'            => 'required_without_all',
                    'StaffId'               => 'required',
                    'RoomId'                => 'required',
                    'CustomerBookingTime'   => 'required',
                ],
                [
                    'required' => 'Bạn chưa nhập thông tin :attribute ',
                    'CustomerPhoneNumber.numeric' => 'Số điện thoại phải là số',
                    'ServicesId.required_without_all' => 'Phải chọn ít nhất 1 dịch vụ',
                ],
                [
                    'CustomerName'          => 'tên khách hàng',
                    'CustomerPhoneNumber'   => 'số điện thoại khách hàng',
                    'ServicesId'            => 'dịch vụ',
                    'StaffId'               => 'nhân viên tiếp nhận',
                    'RoomId'                => 'phòng tiếp nhận',
                    'gender'                => 'giới tính,',
                    'CustomerBookingTime'   => 'Thời gian tiếp nhận',
                ]
            );
        }
            $checkServices = false;
            $checkCustomer = false;
            $checkCustomerBookingDetail = false;


            $checkCustomerBookingDetail = $customerBookingDetail = CustomerBookingDetail::where('CustomerBookingId','=',$request['idCustomerBooking'])->delete();

            if(sizeof($request['ServicesId']) > 1){
                for($i = 0; $i < sizeof($request['ServicesId']); $i++){
                    $CustomerBookingDetail = new CustomerBookingDetail();
                    $CustomerBookingDetail->CustomerBookingId = $request['idCustomerBooking'];
                    $CustomerBookingDetail->ServicesId = $request['ServicesId'][$i];
                    $checkServices = $CustomerBookingDetail->save();
                }
            }
            else{
                $CustomerBookingDetail = new CustomerBookingDetail();
                $CustomerBookingDetail->CustomerBookingId = $request['idCustomerBooking'];
                $CustomerBookingDetail->ServicesId = $request['ServicesId'][0];
                $checkServices = $CustomerBookingDetail->save();
            }
            if($customerBooking->CustomerMember == 0){
                $customer->CustomerName = $request['CustomerName'];
                $customer->CustomerPhoneNumber = $request['CustomerPhoneNumber'];
                $customer->CustomerGender = $request['gender'];
                $checkCustomer = $customer->save();
            }

        DB::beginTransaction();
        try {
            if($request['RoomId'] != $request['RoomOldId']){
                $roomOld = Room::find($request['RoomOldId']);
                $roomOld->RoomBlank += 1;
                $roomOld->save();

                $roomNew = Room::find($request['RoomId']);
                $roomNew->RoomBlank -= 1;
                $roomNew->save();
            }

            if($request['StaffId'] != $request['StaffOldId']){
                $staffOldId = Staff::find($request['StaffOldId']);
                $staffOldId->StaffActive = 0;
                $staffOldId->StaffWorkAtRoom = 1;
                $staffOldId->StaffWorkAtCus = 0;
                $staffOldId->save();

                $staffNew = Staff::find($request['StaffId']);
                $staffNew->StaffActive = 1;
                $staffNew->StaffWorkAtRoom = $request['RoomId'];
                $staffNew->StaffWorkAtCus = $customerBooking->CustomerId;
                $staffNew->save();
            }

            $customerBooking->RoomId = $request['RoomId'];
            $customerBooking->StaffId = $request['StaffId'];
            $customerBooking->CustomerBookingTime = date("Y-m-d H:i:s",strtotime($request['CustomerBookingTime']));
            $customerBooking->updated_at = Carbon::now();
            $customerBooking->save();
            DB::commit();
            $sessionTable->setSessionCustomer();
            $sessionTable->setSessionStaff();
            return back()->with('success_message','Cập nhật thành công khách hàng '.$request['CustomerName']);
        } 
        catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            if($checkCustomerBookingDetail == true and 
                $checkServices == true and
                $checkCustomer == true
                ){
                return redirect()->back()->withInput()->withErrors('Cập nhật phòng và nhân viên thất bại (Các thông tin khác vẫn được cập nhật thành công)');
            }
            else{
                return redirect()->back()->withInput()->withErrors('Cập nhật thất bại)');
            }
        }
        catch(Exception $ex){
            return redirect()->back()->withInput()->withErrors('Chỉnh sửa không thành công lỗi ==>'.$ex->getMessage());
        }
    }
}
