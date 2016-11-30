@extends('Shared.LayoutUser')

@section('content')
        
                        
        <style>
            .MenuTrang li {
                display: inline;
            }   
        </style>
        <h2>HOA THEO CHỦ ĐỀ</h2>
        <div class="alert alert-success" id="success-alert" style="display:none">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Thành công! </strong>
            Đã thêm sản phẩm vào giỏ hàng
        </div>
        @foreach ($layhoatheoCD as $CD) 
        <div class="col-md-4 col-lg-4 col-sm-4">
            <div class="nn-product-box text-center">                
                    <a href="{{action('HoaTuoiController@Chitietsanpham',['id' => $CD->Ma_hoa]) }}">
                    <div class="hovereffect">
                        <img src="{{ asset("Themes/Images/".$CD->Anh_hoa)}}" width="100%" height="300" />            
                        <div class="overlay">
                           <div class="nn-product-box-price ">
                                <h2>GIÁ BÁN:{{ number_format($CD->Gia_ban,0)}}  VNĐ</h2>
                            </div>
                             <a role="button" class="btn btnGioHang info" href="{{action('HoaTuoiController@getGiohang',['id' => $CD->Ma_hoa]) }}" @(hoa.Tinh_trang == false ? "disabled" : "")>
                        <span><b style="color:white">Đặt mua</b></span>
                    </a>
                        </div>                    
                     </div>
                     <a href="{{action('HoaTuoiController@Chitietsanpham',['id' => $CD->Ma_hoa]) }}">
                    <h3 class="nn-product-box-name" style="color:#008848">
                            {{$CD->Ten_hoa}}                            
                    </h3>
                    </a>
                    </a>                    
            </div>
        </div>    
        @endforeach   
        {!! $layhoatheoCD->render() !!}                       
@endsection
