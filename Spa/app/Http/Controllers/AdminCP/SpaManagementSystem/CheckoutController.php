<?php
namespace App\Http\Controllers\AdminCP\SpaManagementSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminCPModel\SpaManagementSystem\CustomerBooking;
class CheckoutController extends Controller
{
    public function showCheckout($idCustomer){
    	$customer = CustomerBooking::find($idCustomer);
    	return view('admincp.spamanasys.CustomerBooking.Checkout',compact('customer'));
    }

    public function showTest(Request $request){
    	return view('admincp.spamanasys.radio');
    }

    public function testCheckbox(Request $request){
    	return $request['na'];
    }
}
