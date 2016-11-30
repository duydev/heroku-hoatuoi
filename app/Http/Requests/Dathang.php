<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Dathang extends FormRequest
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
            'txtNgaygiao' => 'required',
            'txtNguoinhan' => 'required',
            'txtNoigiaohang'=>'required',
        ];
    }
    public function messages()
    {
    return [
                'txtNgaygiao.required' => 'Vui lòng chọn ngày giao hàng',
                'txtNguoinhan.required'  => 'Bạn phải nhập tên người nhận hàng',
                'txtNoigiaohang.required'  => 'Bạn phải nhập địa chỉ giao hàng',
            ];
    }
}
