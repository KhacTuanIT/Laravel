<?php

namespace App\Http\Controllers\Spacms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CmsSpa\Blog;

class BlogcmsController extends Controller
{
    public function getBlogCms() {
    	$blogs = Blog::all();
    	return view('spa.spacms.blogs.blog',compact('blogs'));
    }

    public function getAddBlogCms() {
    	return view('spa.spacms.blogs.add_blog');
    }

	public function postAddBlogCms(Request $req) {
		$this->validate($req,
			[
				'title_blog'=>'required',
				'description_blog'=>'required'
			],
			[
				'required' => 'Bạn chưa nhập :attribute'
			],
			[
				'title_blog'=> ' tiêu đề.',
				'description_blog'=> ' mô tả.'
			]
		);

		$blog = new Blog;
		$blog->title = $req->title_blog;
		$blog->description = $req->description_blog;
		$blog->note = $req->note_blog;

		$checkAddBlog = $blog->save();
		if($checkAddBlog == true) {
			$success = "Thêm blog thành công, blog: ".$blog->title.".";
			return redirect()->back()->withInput()->with('success',$success);
		} else {
			return back()->withErrors()->withInput();
		}
	}

	public function getEditBlogCms($id) {
		$blog = Blog::find($id);
		return view('spa.spacms.blogs.edit_blog',compact('blog'));
	}

	public function postEditBlogCms(Request $req, $id) {
		$this->validate($req,
			[
				'title_blog'=>'required',
				'description_blog'=>'required'
			],
			[
				'required' => 'Bạn chưa nhập :attribute'
			],
			[
				'title_blog'=> ' tiêu đề.',
				'description_blog'=> ' mô tả.'
			]
		);
		$blog = Blog::where('id',$id)->update(array(
			'title' => $req->title_blog,
			'description' => $req->description_blog,
			'note' => $req->note_blog
		));
		if($blog == true) {
			$success = "Cập nhật thông tin thành công, ID: ".$req->id_blog.".";
			return redirect()->back()->withInput()->with('success',$success);
		} else {
			return back()->withErrors();
		}
	}

	public function getDeleteBlogCms($id) {
		$blog = new Blog;
		$checkDelete = $blog->find($id)->delete();
		if($checkDelete == true) {
			$success = "Xóa thành công blog có ID: ". $id.".";
			return back()->with('success',$success);
		} else {
			return back()->withErrors();
		}
	}
}
