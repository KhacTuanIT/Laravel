<?php

namespace App\Http\Controllers\Spa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Spa\Feedback;

class FeedbackController extends Controller
{
    public function postFeedbackPage(Request $req) {
        if($req->ajax()) {

            $validate = $this->validate($req,
                [
                    'name_feedback'=>'required',
                    'address_feedback'=>'required',
                    'email_feedback'=>'required|email',
                    'phone_feedback'=>'required',
                    'message_feedback'=>'required',
                ],
                [
                    'required'=>'Bạn chưa nhập :attribute',
                    'email'=>'Bạn phải nhập đúng định dạng :attribute'
                ],
                [
                    'name_feedback'=>'Họ tên.',
                    'address_feedback'=>'Địa chỉ.',
                    'email_feedback'=>'Email.',
                    'phone_feedback'=>'Số điện thoại.',
                    'message_feedback'=>'Ý kiến phản hồi.',
                ]
            );

            $feedback = new Feedback();
            $feedback->name = $req->name_feedback;
            $feedback->address = $req->address_feedback;
            $feedback->email = $req->email_feedback;
            $feedback->phone = $req->phone_feedback;
            $feedback->message = $req->message_feedback;
            $check = $feedback->save();
            return response()->json([
                'data'=>'Gửi phản hồi thành công',

            ],200);
        }
    }
}
