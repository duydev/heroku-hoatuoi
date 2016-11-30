@extends('Shared.LayoutUser')

@section('content')
       
    <div class="login-page">
      <div class="form modal-content">        
            @if(!empty(Session::get('Thongbao'))) 
                <div class="alert alert-danger">{!! Session::get('Thongbao') !!} </div>
            @endif        
        <form class="login-form" action="Post_Dangnhap" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        <h3 style="color: #4CAF50">Đăng nhập để đặt hàng</h3>
            <input type="text" name="txtUser" placeholder="Tên tài khoản" class="textbox"/>
                @if($errors->has('txtUser'))   
                    <span>
                        <strong style="color: red">{{$errors->first('txtUser')}}</strong>
                    </span>   
                @endif  
            <input type="password" name="txtPass" placeholder="Mật khẩu" class="textbox"/>
                @if($errors->has('txtPass'))   
                    <span>
                        <strong style="color: red">{{$errors->first('txtPass')}}</strong>
                    </span>   
                @endif  
            <button tyle="submit" >Đăng nhập</button>
            <p class="message">Chưa có tài khoản? <a href="Dangky">Đăng ký</a></p>    
        </form>         
      </div>
    </div> 

@endsection