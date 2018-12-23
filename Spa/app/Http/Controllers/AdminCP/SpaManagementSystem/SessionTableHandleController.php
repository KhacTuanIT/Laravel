<?php

namespace App\Http\Controllers\AdminCP\SpaManagementSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionTableHandleController extends Controller
{
	public function setSessionCustomer(){
		return session()->put('customerChange',"modifycustomerSS");
	}

	public function getSessionCustomer(){
		if(session()->has('customerChange')){
				session()->forget('customerChange');
				return 1;
			}else{
				return 0;
			}
	}

	public function setSessionStaff(){
		return session()->put('liststaff',"newStaffChange");
	}

	public function getSessionStaff(){
		if(session()->has('liststaff')){
				session()->forget('liststaff');
				return 1;
			}else{
				return 0;
		}
	}
}
