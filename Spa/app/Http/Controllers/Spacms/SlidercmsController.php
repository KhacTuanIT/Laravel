<?php

namespace App\Http\Controllers\Spacms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\CmsSpa\Slider;

class SlidercmsController extends Controller
{
    public function getSliderCms() {
    	$sliders = Slider::all();
    	return view('spa.spacms.slider.slider',compact('sliders'));
    }

    public function getAddSliderCms() {
    	return view('spa.spacms.slider.add_slider');
    }

    public function postAddSliderCms(Request $req) {
    	$this->validate($req,
    		[
    			'image_slider' => 'required'
    		], 
    		[
    			'image_slider' => 'Bạn chưa chọn ảnh.'
    		]
    	);

    	$slider = new Slider();
    	if($req->hasFile('image_slider')) {
			$file = $req->file('image_slider');
			$extensions = $file->getClientOriginalExtension();
			if($extensions != 'png' and $extensions != 'jpeg' and $extensions != 'jpg') {
				return back()->withErrors('Bạn chỉ có thể upload file ảnh!');
			}
			$name = str_random(10).'.'.$file->getClientOriginalExtension();
	        $file->move('source/spa/assets/images/sliders/', $name);
	        $slider->image = $name;
		}
		$checkSave = $slider->save();
		if($checkSave == true) {
			return redirect()->route('slider-cms')->with('success',"Thêm thành công ảnh $slider->image");
		} else {
			return back()->withErrors();
		}
    }

    public function getDeleteSliderCms($id) {
    	$slider = new Slider();
    	$temp = $slider->find($id);
    	$image = $temp->image;
		$filePath = 'source/spa/assets/images/sliders/'.$image;
		if(file_exists($filePath)) {
			$checkDeleteFile = File::delete($filePath);
		} else {
			$checkDeleteFile = true;
		}
		
		if($checkDeleteFile == true) {
			$checkDelete = $slider->find($id)->delete();
			if($checkDelete == true) {
				$success = "Xóa thành ảnh : $image.";
				return back()->with('success',$success);
			}
		} else {
			return back()->withErrors();
		}
    }
}
