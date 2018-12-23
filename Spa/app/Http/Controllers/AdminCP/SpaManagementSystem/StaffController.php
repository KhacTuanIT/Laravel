<?php

namespace App\Http\Controllers\AdminCP\SpaManagementSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminCPModel\SpaManagementSystem\Staff;
use Carbon\Carbon;
class StaffController extends Controller
{
    public function showAddStaff(){
    	return view('admincp.spamanasys.Staff.AddStaff');
    }

    public function addStaff(Request $request){
    	if($request->ajax()){
    		$this->validate($request,
    			[
    				'fullname' => 'required',
    				'phonenumber' => 'required|numeric|unique:spams_staff,StaffPhoneNumber',
    				'gender' => 'required',
    			],
    			[
    				'fullname.required' => 'Vui lòng nhập tên nhân viên',
    				'phonenumber.required' => 'Vui lòng nhập số điện thoại',
    				'phonenumber.numberic' => 'Số điện thoại không hợp lệ',
    				'phonenumber.unique' => 'Số điện thoại đã có nhân viên đăng ký',

    			]
    		);
    		$staff = new Staff();
    		$staff->StaffName = $request['fullname'];
    		$staff->StaffPhoneNumber = $request['phonenumber'];
    		$staff->StaffGender = $request['gender'];
    		$staff->StaffAddress = $request['address'];

    		//THIS IS DEFAULT VALUE - DO NOT MODIFY
    		$staff->StaffActive = 0;
    		$staff->StaffWorkAtRoom = 1;
    		$staff->StaffWorkAtCus = 0;
    		$staff->StaffRating = 0;
    		$check = $staff->save();
    		return response()->json(['status' => $check]);
    	}
    }

    public function showListStaff(){
    	$listStaff = Staff::all();
    	return view('admincp.spamanasys.Staff.ListStaff',compact('listStaff'));
    }

    public function showEditStaff($idStaff){
    	$staff = Staff::find($idStaff);
    	return view('admincp.spamanasys.Staff.EditStaff',compact('staff'));
    }

    public function editStaff($idStaff, Request $request){
    	if($request->ajax()){
    		$this->validate($request,
    			[
    				'fullname' => 'required',
    				'phonenumber' => 'required|numeric|unique:spams_staff,StaffPhoneNumber,'.$idStaff.',StaffId',
    				'gender' => 'required',
    			],
    			[
    				'fullname.required' => 'Vui lòng nhập tên nhân viên',
    				'phonenumber.required' => 'Vui lòng nhập số điện thoại',
    				'phonenumber.numberic' => 'Số điện thoại không hợp lệ',
    				'phonenumber.unique' => 'Số điện thoại đã có nhân viên đăng ký',

    			]
    		);
    		$staff = Staff::find($idStaff);
    		$staff->StaffName = $request['fullname'];
    		$staff->StaffPhoneNumber = $request['phonenumber'];
    		$staff->StaffGender = $request['gender'];
    		$staff->StaffAddress = $request['address'];
    		$check = $staff->save();
    		return response()->json(['status' => $check]);
    	}
    }
}
