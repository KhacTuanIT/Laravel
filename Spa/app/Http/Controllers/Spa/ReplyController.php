<?php

namespace App\Http\Controllers\Spa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Spa\Comment;
use App\Spa\Reply;

class ReplyController extends Controller
{
    public function postReplyPage(Request $req) {
        if($req->ajax()) {
            $this->validate($req,
                [
                    'name_reply'=>'required',
                    'email_reply'=>'required|email',
                    'message_reply'=>'required',
                ],
                [
                    'required'=>':attribute không được để trống.',
                    'email'=>':attribute phải nhập đúng định dạng.'
                ],
                [
                    'name_reply'=>'Họ tên',
                    'email_reply'=>'Email',
                    'message_reply'=>'Bình luận',
                ]
            );
            $reply = new Reply();
            $reply->name = $req->name_reply;
            $reply->email = $req->email_reply;
            $reply->message = $req->message_reply;
            $reply->comment_id = $req->id_comment;
            $reply->save();
            
            $msg = '<div class="media"><div class="media-left"><img src="assets/images/img_avatar1.png" class="media-object" style="width:45px"></div><div class="media-body"><h4 class="media-heading">';
            $msg = $msg.$reply->name;
            $msg = $msg.'<small><i>Posted on ';
            $msg = $msg.date('h:i:s-M d,y',strtotime($reply->created_at));
            $msg = $msg.'</i></small></h4><p>';
            $msg = $msg.$reply->message;
            $msg = $msg.'</p></div></div>';
            return response()->json([
                'data'=>'Gửi bình luận thành công',
                'msg'=>$msg
            ],200);
        }
    }
}
