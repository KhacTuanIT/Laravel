<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\CmsSpa\Service;
use App\CmsSpa\ServiceType;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title_service'=>['required|unique:spa_services,title','string', new Uppercase],
			'aside_service'=>'required',
			'image_service'=>'required',
			'price_service'=>'required',
			'type_service'=>'required',
        ];
    }

    public function messages() {
    	return [
    		'title_service.required'=>'Bạn chưa nhập tiêu tên dịch vụ.',
    		'title_service.unique'=>'Dịch vụ đã tồn tại.',
			'aside_service.required'=>'Bạn chưa chọn vị trí.',
			'image_service.required'=>'Bạn chưa chọn ảnh.',
			'price_service.required'=>'Bạn chưa nhập giá.',
			'type_service.required'=>'Bạn chưa chọn loại dịch vụ.',
    	];
    }
}
