<?php

namespace App\Http\Controllers\Spa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Spa\Comment;
use App\Spa\Reply;

class CommentController extends Controller
{
    public function postCommentPage(Request $req) {
        if($req->ajax()) {
            $this->validate($req, 
                [
                    'name_comment'=>'required',
                    'email_comment'=>'required|email',
                    'message_comment'=>'required',
                ], 
                [
                    'required'=>':attribute không được để trống.',
                    'email'=>':attribute phải nhập đúng định dạng.'
                ], 
                [
                    'name_comment'=>'Họ tên',
                    'email_comment'=>'Email',
                    'message_comment'=>'Bình luận',
                ]
            );

            $comment = new Comment();
            $comment->name = $req->name_comment;
            $comment->email = $req->email_comment;
            $comment->message = $req->message_comment;
            $comment->post_id = $req->id_post;
            $comment->save();
            
            $msg = '<div class="col-sm-12 col-xs-12 boxcom"><div class="media-left"><img src="assets/images/img_avatar1.png" class="media-object" style="width:45px"></div><div class="media-body"><h4 class="media-heading">';
            $msg = $msg.$comment->name;
            $msg = $msg.'<small> <i>Posted on ';
            $msg =$msg.date('h:i:s-M d,y',strtotime($comment->created_at));
            $msg = $msg.'</i></small> <small class="reply">Trả lời</small><small class="num-reply" style="display: none;"></small></h4><p>';
            $msg = $msg.$comment->message;
            $msg = $msg.'</p><!-- Nested media object --><div class="reply-box" style="display: none;"></div><div class="box-comment" style="display: none;"><div class="text-center form-comment"><form id="';
            $msg = $msg.$comment->id;
            $msg = $msg.'"><div class="col-sm-6 col-xs-12 form-group"><input class="form-control name_reply" type="text" name="name_reply" placeholder="Họ tên"><!-- <i class="fas fa-user"></i> --></div><div class="col-sm-6 col-xs-12 form-group"><input class="form-control email_reply" type="email" name="email_reply" placeholder="Email"><!-- <i class="fas fa-user"></i> --></div><div class="col-sm-12 col-xs-12 form-group"><textarea class="form-control message_reply" rows="5" name="message_reply"></textarea><i class="fas fa-paper-plane"></i></div><div class="col-sm-12 col-xs-12 form-group text-right"><input class="btn-book-service reply_button" type="button" data-pid="';
            $msg = $msg.$req->id_post;
            $msg = $msg.'" data-reurl="';
            $msg = $msg.$req->reurl;
            $msg = $msg.'" data-numre="0" name="reply_button" value="Trả lời"></div></form></div><div class="clear"></div></div></div></div>';
            return response()->json([
                'data'=>'Gửi bình luận thành công',
                'msg'=>$msg,
            ],200);
        }
    }
    

    public function getCommentPage($id, $idpost) {
        $allComments = Comment::where('post_id',$idpost)->get();
        $comments = Comment::where('id','<',$id)->where('post_id',$idpost)->orderBy('id','desc')->take(4)->get();
        $commentd = Comment::where('id','>=',$id)->where('post_id',$idpost)->orderBy('id','desc')->get();
        $replies = Reply::all();
        if(count($allComments) > (count($comments)+count($commentd))) {
            $id_comment = 0;
            foreach($comments as $comment) {
                $id_comment = $comment->id;
            }
            return response()->json([
                'msg'=>$comments,
                'id_comment'=>$id_comment,
                'replies'=>$replies
            ],200);
        } else {
            $id_comment = 0;
            return response()->json([
                'msg'=>$comments,
                'id_comment'=>$id_comment,
                'replies'=>$replies
            ],200);
        }
    }
}
