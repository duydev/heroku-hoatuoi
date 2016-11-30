<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangkyRequest extends FormRequest
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
            'txtName' => 'required',            
            'txtUser' => 'required|min:5|unique:khach_hang,Tai_khoan',
            'txtPass' => 'required|min:5',
            'rePass' =>  'required|same:txtPass',
            'txtEmail' => 'required|email',
            'txtAddress' => 'required',
            'txtNum' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }
    public function messages()
    {
    return [
        'txtName.required' => 'Phải nhập tên người dùng',
        'txtUser.min'=> 'Tên tài khoản ít nhất 5 ký tự', 
        'txtUser.unique'=> 'Tài khoản này đã tồn tại', 
        'txtUser.required' => 'Phải nhập tên tài khoản',
        'txtPass.required'  => 'Phải nhập mật khẩu',        
        'txtPass.min'=> 'Password ít nhất 5 ký tự',
        

        'rePass.required'  => 'Phải xác nhận mật khẩu',
        'rePass.same' => 'Mật khẩu nhập lại không chính xác',
        

        'txtEmail.required' => 'Email không được bỏ trống',
        'txtEmail.email' => 'Nhập đúng email',

        'txtAddress.required' => 'Nhập địa chỉ khách hàng',
        'txtNum.required' => 'Sdt không được bỏ trống',
    ];

    }
}
