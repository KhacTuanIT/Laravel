<?php

namespace App\Http\Controllers\SpaCms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CmsSpa\Comment;
use App\CmsSpa\Reply;
use App\CmsSpa\Post;

class CommentcmsController extends Controller
{
    public function getCommentCms() {
    	$comments = Comment::orderby('post_id','asc')->get();
    	return view('spa.spacms.comment.comment',compact('comments'));
    }

    public function postDetailCommentCms(Request $req) {
    	if($req->ajax()) {
    		$comments = Comment::findOrFail($req->comid);
    		$replies = Reply::where('comment_id',$req->comid)->get();
    		$postTitle = Post::findOrFail($comments->post_id);
    		$allComment['ID'] = $comments->id;
    		$allComment['Tên'] = $comments->name;
    		$allComment['Email'] = $comments->email;
    		$allComment['Bình luận'] = $comments->message;
    		$allComment['Thời gian'] = date('M d,y - h:i:s',strtotime($comments->created_at));
    		$allComment['Bài viết'] = $postTitle->title;
    		$c = 0;
    		if(count($replies) > 0) {
	    		foreach ($replies as $key) {
	    			$c += 1;
	    			$allReply[$c]['ID'] = $key->id;
	    			$allReply[$c]['Tên'] = $key->name;
	    			$allReply[$c]['Email'] = $key->email;
	    			$allReply[$c]['Câu trả lời'] = $key->message;
	    			$allReply[$c]['Thời gian'] = date('M d,y - h:i:s',strtotime($key->created_at));
	    		}
	    		return response()->json([
	    			'comment'=>$allComment,
	    			'reply'=>$allReply,
	    			'count'=>count($replies)
	    		],200);
    		} else {

    			return response()->json([
	    			'comment'=>$allComment,
	    			'count'=>count($replies)
	    		],200);
    		}

    	} else {
    		return response()->withErrors();
    	}
    }
}
