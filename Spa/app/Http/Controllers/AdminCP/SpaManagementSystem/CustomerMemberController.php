<?php

namespace App\Http\Controllers\AdminCP\SpaManagementSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminCPModel\SpaManagementSystem\CustomerMember;
use Carbon\Carbon;
class CustomerMemberController extends Controller
{
    public function showAddCustomerMember(){
    	return view('admincp.spamanasys.CustomerMember.AddCustomerMember');
    }

    public function addCustomerMember(Request $request){
    	if($request->ajax()){
    		$this->validate($request,
    			[
    				'fullname' => 'required',
    				'phonenumber' => 'required|numeric|unique:CustomerMember,CustomerMemberPhoneNumber',
    				'gender' => 'required',
    			],
    			[
    				'fullname.required' => 'Vui lòng nhập tên khách hàng',
    				'phonenumber.required' => 'Vui lòng nhập số điện thoại',
    				'phonenumber.numberic' => 'Số điện thoại không hợp lệ',
    				'phonenumber.unique' => 'Số điện thoại đã có người đăng ký',

    			]
    		);

    		$customerMemberLastedId = CustomerMember::orderBy('created_at', 'desc')->first();
    		$customerMemberLastedIdModify = preg_replace('/[^0-9]+/', '', $customerMemberLastedId->CustomerMemberId);
    		$customerMember = new CustomerMember;
    		$customerMember->CustomerMemberId = "KHTV".($customerMemberLastedIdModify+=1);
    		$customerMember->CustomerMemberName = $request['fullname'];
    		$customerMember->CustomerMemberPhoneNumber = $request['phonenumber'];
    		$customerMember->CustomerMemberGender = $request['gender'];
    		$customerMember->CustomerMemberAddress = $request['address'];
    		$customerMember->CustomerMemberNote = $request['note'];
  			$check = $customerMember->save();

    		return response()->json(['status' => $check]);

    	}
    }
    public function showListCustomerMember(){
    	$listCustomerMember = CustomerMember::all();
    	return view('admincp.spamanasys.CustomerMember.ListCustomerMember',compact('listCustomerMember'));
    }

    public function showEditCustomerMember($idCustomerMember){
    	$customerMember = CustomerMember::find($idCustomerMember);
    	$updated_at = Carbon::createFromTimeStamp(strtotime($customerMember->updated_at))->diffForHumans();
    	return view('admincp.spamanasys.CustomerMember.EditCustomerMember',compact('customerMember','updated_at'));
    }

    public function editCustomerMember($idCustomerMember, Request $request){
    	if($request->ajax()){
    		$this->validate($request,
    			[
    				'fullname' => 'required',
    				'phonenumber' => 'required|numeric|unique:CustomerMember,CustomerMemberPhoneNumber,'.$idCustomerMember.',CustomerMemberId',
    				'gender' => 'required',
    			],
    			[
    				'fullname.required' => 'Vui lòng nhập tên khách hàng',
    				'phonenumber.required' => 'Vui lòng nhập số điện thoại',
    				'phonenumber.numberic' => 'Số điện thoại không hợp lệ',
    				'phonenumber.unique' => 'Số điện thoại đã có người đăng ký',

    			]
    		);

    		$customerMember = CustomerMember::find($idCustomerMember);
    		$customerMember->CustomerMemberName = $request['fullname'];
    		$customerMember->CustomerMemberPhoneNumber = $request['phonenumber'];
    		$customerMember->CustomerMemberGender = $request['gender'];
    		$customerMember->CustomerMemberAddress = $request['address'];
    		$customerMember->CustomerMemberNote = $request['note'];
  			$check = $customerMember->save();

    		return response()->json(['status' => $check]);

    	}
    }
}
