<?php
namespace App\Http\Controllers\AdminCP\SpaManagementSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\AdminCPModel\SpaManagementSystem\CustomerBooking;
use App\AdminCPModel\SpaManagementSystem\CustomerBookingDetail;
use App\AdminCPModel\SpaManagementSystem\Customer;
use App\AdminCPModel\SpaManagementSystem\CustomerMember;
use App\AdminCPModel\SpaManagementSystem\HistoryMember;
use App\AdminCPModel\SpaManagementSystem\HistoryMemberDetail;
use App\AdminCPModel\SpaManagementSystem\Services;
use App\AdminCPModel\SpaManagementSystem\Room;
use App\AdminCPModel\SpaManagementSystem\Staff;
use App\AdminCPModel\SpaManagementSystem\Coupon;
use App\AdminCPModel\SpaManagementSystem\Logs;
use App\AdminCPModel\SpaManagementSystem\LogsDetail;
use App\Http\Controllers\AdminCP\SpaManagementSystem\SessionTableHandleController;
class CheckoutController extends Controller
{
    public function showCheckout($idCustomer){

    	$customerBooking = CustomerBooking::where('CustomerBookingId','=',$idCustomer)->get();
        $customerBooking = $customerBooking[0];
        $listServices = CustomerBookingDetail::where('CustomerBookingId','=',$idCustomer)->get();
        $price = 0.0;
        foreach ($listServices as $key => $value) {
            $price += $value->getServices->ServicesPrice;
        }
    	return view('admincp.spamanasys.Checkout.Checkout',compact('customerBooking','listServices','price'));
    }

    public function checkCoupon($couponCode){
        $couponStock = array();
        $listCoupon = Coupon::all();
        foreach ($listCoupon as $key => $value) {
            $couponStock[] = strtolower($value->CouponCode);
        }
        for($i = 0; $i < sizeof($couponStock);$i++){
            if(strtolower($couponCode) == $couponStock[$i]){
                return true;
            }
        }
        return false;
    }
    
    public function getCouponValue($couponCode){
        $couponValueOBJ = Coupon::where('CouponCode',$couponCode)->get();
        $couponValue = $couponValueOBJ[0]['CouponValue'];
        return $couponValue;
    }

    public function applyCoupon(Request $request){
        if($request->ajax()){

            $couponCode = strtolower(strip_tags($request['couponCode']));
            //GET MONEY MUST PAY
            $listServices = CustomerBookingDetail::where('CustomerBookingId','=',$request['idCustomerBooking'])->get();
            $priceStock = 0.0;

            foreach ($listServices as $key => $value) {
                $priceStock += $value->getServices->ServicesPrice;
            }
            
            if($couponCode == ""){
                $msg = "Vui lòng nhập mã COUPON";
                return response()->json(array(
                    'msg'=> $msg,
                    'priceStock' => "",
                    'couponValue' => "",
                    'priceDiscounted' => "",
                    'total' => number_format($priceStock,0,",",".")." VNĐ",
                ), 200);
            }
            else if($this->checkCoupon($couponCode) == true){
                //COMPARE DATE EXPIRED COUPON 
                $couponDateExpired = Coupon::where('CouponCode',$couponCode)->value('CouponDateExpired');
                $couponDateExpired = date("Y-m-d H:i",strtotime($couponDateExpired));
                $dateTimeNow = Carbon::now()->format("Y-m-d H:i");
                if(($dateTimeNow > $couponDateExpired) == true){
                    $msg = "Mã COUPON đã hết ngày sử dụng (".date("H:i d-m-Y",strtotime($couponDateExpired)).")";
                    return response()->json(array(
                        'msg'=> $msg,
                        'priceStock' => "",
                        'couponValue' => "",
                        'priceDiscounted' => "",
                        'total' => number_format($priceStock,0,",",".")." VNĐ",
                    ), 200);
                }
                else{
                    $couponValue = Coupon::where('CouponCode',$couponCode)->value('CouponValue');
                // $couponValue = $couponValueOBJ[0]['CouponValue'];
                    $priceDiscounted = $priceStock - $couponValue;
                    $msg = "Áp dụng coupon : ".strtoupper($couponCode)." thành công.";
                    return response()->json(array(
                        'msg'=> $msg,
                        'status' => true,
                        'priceStock' => "Giá gốc: ".number_format($priceStock,0,",",".")." VNĐ",
                        'couponValue' => "Giảm: -".number_format($couponValue,0,",",".")." VNĐ",
                        'priceDiscounted' => "Thành tiền: ".number_format($priceDiscounted,0,",",".")." VNĐ",
                        'total' => number_format($priceDiscounted,0,",",".")." VNĐ",
                    ), 200);
                }
                // var_dump($dateTimeNow);
                // die();
                //END COMPARE
                
            }
            else{
                $msg = "Mã COUPON không tồn tại";
                return response()->json(array(
                    'msg'=> $msg,
                    'priceStock' => "",
                    'couponValue' => "",
                    'priceDiscounted' => "",
                    'total' => number_format($priceStock,0,",",".")." VNĐ",
                ), 200);
            }
        }
    }

    public function redirectCheckoutCus($id){
        return redirect()->route('spa_showListCustomerMember');
    }

    public function getStockValueCoupon(Request $request){
        $listServices = CustomerBookingDetail::where('CustomerBookingId','=',$request['idCustomerBooking'])->get();
        $priceStock = 0.0;

        foreach ($listServices as $key => $value) {
            $priceStock += $value->getServices->ServicesPrice;
        }
        return number_format($priceStock,0,",",".");
    }

    public function checkout($idCustomerBooking,SessionTableHandleController $sessionTable, Request $request){  
        DB::beginTransaction();
        try{
            //GET INFORMATION FOR BILLING
            $customerBooking = CustomerBooking::find($idCustomerBooking);
            $idCustomer = $customerBooking->CustomerId;
            $idRoom = $customerBooking->RoomId;
            $idStaff = $customerBooking->StaffId;

            //GET PRICE MUST PAY
            $CustomerBookingDetail = CustomerBookingDetail::where('CustomerBookingId','=',$idCustomerBooking)->get();
            $orderPrice = 0.0;
            foreach ($CustomerBookingDetail as $key => $value) {
                $orderPrice += $value->getServices->ServicesPrice;
            }
            $moneyTotal = $orderPrice;
            //Apply Coupon if it valid
            if($request['checkCoupon'] == "true" and $this->checkCoupon($request['couponCode']) == true){
                $orderPrice -= $this->getCouponValue($request['couponCode']);
            }
            

            //MODIFY DATA
            $room = Room::find($idRoom);
            $room->RoomBlank += 1;
            $room->save();

            $staff = Staff::find($idStaff);
            $staff->StaffActive = 0;
            $staff->StaffWorkAtRoom = 1;
            $staff->StaffWorkAtCus = 0;
            $staff->save();

            //Declare variable for return view
            $CustomerMemberName;
            $CustomerMemberPhoneNumber;
            $CustomerMemberGender;
            $CustomerName;
            $CustomerPhoneNumber;
            $CustomerGender;


            //SAVE TO HISTORY MEMBER AND TO RESPONSE
            $checkIsCustomerMember = false;
            if($customerBooking->CustomerMember == 1){
                $customerMember = CustomerMember::find($idCustomer);
                $CustomerMemberName = $customerMember->CustomerMemberName;
                $CustomerMemberPhoneNumber = $customerMember->CustomerMemberPhoneNumber;
                $CustomerMemberGender = $customerMember->CustomerMemberGender;

                $historyMember = new HistoryMember();
                $historyMember->CustomerMemberId = $idCustomer;
                $historyMember->RoomId = $idRoom;
                $historyMember->StaffId = $idStaff;
                $historyMember->MoneyTotal = $moneyTotal;
                if($request['checkCoupon'] == true and $this->checkCoupon($request['couponCode']) == true){
                    $historyMember->CouponCode = $request['couponCode'];
                }                
                $historyMember->MoneyPaid = $orderPrice;
                $historyMember->BookingTime = $customerBooking->CustomerBookingTime;
                $historyMember->EndTime = Carbon::now();
                $historyMember->save();
                $idHistoryMember = $historyMember->HistoryMemberId;
                $customerBookingDetail = CustomerBookingDetail::where('CustomerBookingId','=',$customerBooking->CustomerBookingId)->get();
                foreach ($customerBookingDetail as $key => $value) {
                    $historyMemberDetail = new HistoryMemberDetail();
                    $historyMemberDetail->HistoryMemberId = $idHistoryMember;
                    $historyMemberDetail->CustomerMemberId = $idCustomer;
                    $historyMemberDetail->ServicesId = $value->ServicesId;
                    $historyMemberDetail->save();
                }
                $checkIsCustomerMember = true;
            }

            if($customerBooking->CustomerMember == 0){
                $customer = Customer::find($idCustomer);
                $CustomerName = $customer->CustomerName;
                $CustomerPhoneNumber = $customer->CustomerPhoneNumber;
                $CustomerGender = $customer->CustomerGender;
            
                $logs = new Logs();
                $logs->CustomerName = $CustomerName;
                $logs->CustomerPhoneNumber = $CustomerPhoneNumber;
                $logs->CustomerGender = $CustomerGender;
                $logs->RoomId = $idRoom;
                $logs->StaffId = $idStaff;
                $logs->MoneyTotal = $moneyTotal;
                if($request['checkCoupon'] == "true" and $this->checkCoupon($request['couponCode']) == true){
                    $logs->CouponCode = $request['couponCode'];
                }                
                $logs->MoneyPaid = $orderPrice;
                $logs->BookingTime = $customerBooking->CustomerBookingTime;
                $logs->EndTime = Carbon::now();
                $logs->save();
                $idLogs = $logs->LogsId;

                $customerBookingDetail = CustomerBookingDetail::where('CustomerBookingId','=',$customerBooking->CustomerBookingId)->get();
                foreach ($customerBookingDetail as $key => $value) {
                    $logsDetail = new LogsDetail();
                    $logsDetail->LogsId = $idLogs;
                    $logsDetail->CustomerPhoneNumber = $CustomerPhoneNumber;
                    $logsDetail->ServicesId = $value->ServicesId;
                    $logsDetail->save();
                }
                $checkIsCustomerMember = false;
                //CLEAR DATA FROM TABLE
                Customer::find($idCustomer)->delete();
            }

            //CLEAR DATA FROM TABLE
            CustomerBookingDetail::where('CustomerBookingId','=',$idCustomerBooking)->delete();
            CustomerBooking::find($idCustomerBooking)->delete();

            DB::commit();
            $sessionTable->setSessionCustomer();
            $sessionTable->setSessionStaff();
            if($checkIsCustomerMember == true){
                return view('admincp.spamanasys.Checkout.Bill',
                    [   
                        'status' => true,
                        'customerMember' => true,
                        'icon' => 'fa fa-check',
                        'iconColor' => '#34bfa3',
                        'Message' => "THANH TOÁN THÀNH CÔNG",
                        'idToInvoice' => $idHistoryMember,
                        'idCustomer' => $idCustomer,
                        'idStaff' => $idStaff,
                        'CustomerName' => $CustomerMemberName,
                        'CustomerPhoneNumber' => $CustomerMemberPhoneNumber,
                        'CustomerGender' => $CustomerMemberGender,
                        'orderPrice' => $orderPrice,
                    ]
                );
            }
            else{
                return view('admincp.spamanasys.Checkout.Bill',
                    [   
                        'status' => true,
                        'customerMember' => false,
                        'icon' => 'fa fa-check',
                        'iconColor' => '#34bfa3',
                        'Message' => "THANH TOÁN THÀNH CÔNG",
                        'idToInvoice' => $idLogs,
                        'idCustomer' => $idCustomer,
                        'idStaff' => $idStaff,
                        'CustomerName' => $CustomerName,
                        'CustomerPhoneNumber' => $CustomerPhoneNumber,
                        'CustomerGender' => $CustomerGender,
                        'orderPrice' => $orderPrice,
                    ]
                );
            }
        }
        catch(\Illuminate\Database\QueryException $e){
            DB::rollback();
            if($checkIsCustomerMember == true){
                return view('admincp.spamanasys.Checkout.Bill',
                    [   
                        'status' => false,
                        'icon' => 'fa fa-remove',
                        'iconColor' => 'red',
                        'Message' => "THANH TOÁN THẤT BẠI ".$e->getMessage(),
                        'idCustomer' => $idCustomerBooking,
                        'CustomerName' => $CustomerMemberName,
                        'CustomerPhoneNumber' => $CustomerMemberPhoneNumber,
                        'CustomerGender' => $CustomerMemberGender,
                        'orderPrice' => $orderPrice,
                    ]
                );
            }
            else{
                return view('admincp.spamanasys.Checkout.Bill',
                    [   
                        'status' => false,
                        'icon' => 'fa fa-remove',
                        'iconColor' => 'red',
                        'Message' => "THANH TOÁN THẤT BẠI ".$e->getMessage(),
                        'idCustomer' => $idCustomerBooking,
                        'CustomerName' => $CustomerName,
                        'CustomerPhoneNumber' => $CustomerPhoneNumber,
                        'CustomerGender' => $CustomerGender,
                        'orderPrice' => $orderPrice,
                    ]
                );                
            }
        }
    }

    public function printInvoice($member,$id){
        $customer = NULL;
        if($member == "CustomerMember"){
            $historyMember = HistoryMember::find($id);
            $listServices = HistoryMemberDetail::where("HistoryMemberId","=",$historyMember->HistoryMemberId)->get();
            return view("admincp.spamanasys.Checkout.Invoice.InvoiceCustomerMember",compact('historyMember','listServices'));
        }
        if($member == "Customer"){
            $logs = Logs::find($id);
            $listServices = LogsDetail::where("LogsId","=",$logs->LogsId)->get();
            return view("admincp.spamanasys.Checkout.Invoice.Invoice",compact('logs','listServices'));
        }
    }
    
    public function showRatingStaff($idStaff){
        $staff = Staff::find($idStaff);
        return view('admincp.spamanasys.Checkout.RatingStaff',compact('staff'));
    }

    public function setRatingStaff($idStaff,Request $request){
        $staff = Staff::find($idStaff);
        $staff->StaffRating = $request['starValue'];
        $staff->save();

        $staff = Staff::find($idStaff);
        $startLastRate = $staff->StaffRating;
        return response()->json(array('staffRating' => $startLastRate));
    }

    public function getInforStaff($idStaff){
        $infoStaff = Staff::find($idStaff);
        return response()->json($infoStaff);
    }
}
