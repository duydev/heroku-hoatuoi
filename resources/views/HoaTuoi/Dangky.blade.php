@extends('Shared.LayoutUser')

@section('content')

    <div class="register-page">    
        <div class="form modal-content altre">
            @if(!empty(Session::get('Thongbao1'))) 
                <div class="alert alert-success">
                    <a href="{{asset('/Dangnhap')}}">
                        {!! Session::get('Thongbao1') !!} 
                    </a>
                </div>
            @endif
            <form action="Post_Dangky" method="post" class="login-form" name="DangkyRequest">                
                <h2 style="color:#4CAF50 ">Đăng ký tài khoản</h3>
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="text" name="txtName" id="name" spellcheck="false" placeholder="Họ và tên"/>   
                @if($errors->has('txtName'))   
                    <span>
                        <strong style="color: red">{{$errors->first('txtName')}}</strong>
                    </span>   
                @endif      
                <input type="text" name="txtUser" id="username" spellcheck="false" placeholder="Tên tài khoản" />
                @if($errors->has('txtUser'))   
                    <span>
                        <strong style="color: red">{{$errors->first('txtUser')}}</strong>
                    </span>   
                @endif
                <input type="password" name="txtPass" id="password" placeholder="Mật khẩu" />
                @if($errors->has('txtPass'))   
                    <span>
                        <strong style="color: red">{{$errors->first('txtPass')}}</strong>
                    </span>   
                @endif
                <input type="password" name="rePass" id="password-again" placeholder="Nhập lại mật khẩu" />
                @if($errors->has('rePass'))   
                    <span>
                        <strong style="color: red">{{$errors->first('rePass')}}</strong>
                    </span>   
                @endif
                <input type="text" name="txtEmail" id="email" spellcheck="false" placeholder="Email"/>
                @if($errors->has('txtEmail'))   
                    <span>
                        <strong style="color: red">{{$errors->first('txtEmail')}}</strong>
                    </span>   
                @endif
                <input type="text" name="txtAddress" id="address" spellcheck="false" placeholder="Địa chỉ"/>
                @if($errors->has('txtAddress'))   
                    <span>
                        <strong style="color: red">{{$errors->first('txtAddress')}}</strong>
                    </span>   
                @endif
                <input type="text" name="txtNum" id="numberphone" spellcheck="false" placeholder="Số điện thoại"/>  
                @if($errors->has('txtNum'))   
                    <span>
                        <strong style="color: red">{{$errors->first('txtNum')}}</strong>
                    </span>   
                @endif  
                {!! app('captcha')->display(); !!} 
                @if($errors->has('g-recaptcha-response'))                   
                    <span class="help-block">
                        <strong style="color: red">{{$errors->first('g-recaptcha-response')}}</strong>
                    </span>
                @endif               
                <button type="submit">Đăng ký</button>
            </form>
        </div>
    </div>
@endsection