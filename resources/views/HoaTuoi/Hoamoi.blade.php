<link rel="stylesheet" type="text/css" href="{{ asset("Themes/Contents/css/nn-style1.css") }}"/>
<h2>
    <img src="{{asset("Themes/Images/icon.png")}}" width="40" height="40" />
    CÁC SẢN PHẨM MỚI NHẤT
</h2>
<div class="alert alert-success" id="success-alert" style="display:none">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Thành công! </strong>
    Đã thêm sản phẩm vào giỏ hàng
</div>

@foreach($layhoamoi as $new)
    <div class="col-md-4 col-lg-4 col-sm-4">
    <div class="nn-product-box text-center">
        <a href="{{action('HoaTuoiController@Chitietsanpham',['id' => $new->Ma_hoa]) }}">
            <div class="hovereffect">
                <img src="{{ asset("Themes/Images/".$new->Anh_hoa ) }}" width="100%" height="250" />
                <div class="overlay">
                   <div class="nn-product-box-price ">
                        <h2>{{ number_format($new->Gia_ban,0)}}  VNĐ</h2>
                </div>
                   <a role="button" class="btn btnGioHang info" href="{{action('HoaTuoiController@getGiohang',['id' => $new->Ma_hoa]) }}" @(hoa.Tinh_trang == false ? "disabled" : "")>
                        <span><b style="color:white">Đặt mua</b></span>
                    </a>
                </div>
            </div>   
            <a href="{{action('HoaTuoiController@getGiohang',['id' => $new->Ma_hoa]) }}">             
            <h3 class="nn-product-box-name" style="color:#008848">
                {{$new->Ten_hoa}}
                <img src="{{ asset("Themes/Images/new.gif")}}" />                
            </h3>
            </a>
        </a>            
            <div class="nn-product-box-actions">
                
            </div>        
    </div>
</div>
@endforeach