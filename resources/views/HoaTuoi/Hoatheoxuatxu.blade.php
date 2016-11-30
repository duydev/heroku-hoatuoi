@extends('Shared.LayoutUser')

@section('content')
<style>
    .MenuTrang li {
        display: inline;
    }
</style>
<h2>HOA THEO XUẤT XỨ</h2>
<div class="alert alert-success" id="success-alert" style="display:none">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Thành công! </strong>
    Đã thêm sản phẩm vào giỏ hàng
</div>
<script>
    $(document).ready(function () {

        // Khi nhan vao nut "Them vao gio hang"
        $(".btnGioHang").click(function (e) {

            // Ngan khong chuyen trang
            e.preventDefault();

            //Them mot san pham vao gio hang
            var url = $(this).attr("href");
            $.get(url, function (data) {
            });

            // Hien ra Alert
            $("#success-alert").show();
            //Thoi gian an Alert 2s
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            });
        });

    });
</script>
@foreach ($layhoatheoXX as $XX)
<div class="col-md-4 col-lg-4 col-sm-4">    
    <div class="nn-product-box text-center">
     <a href="{{action('HoaTuoiController@Chitietsanpham',['id' => $XX->Ma_hoa]) }}">
        <div class="hovereffect">           
                <img src="{{ asset("Themes/Images/".$XX->Anh_hoa)}}" width="100%" height="250" alt="" />
                <div class="overlay">
                   <div class="nn-product-box-price ">
                        <h2>{{ number_format($XX->Gia_ban,0)}}  VNĐ</h2>
                    </div>
                     <a role="button" class="btn btnGioHang info" href="{{action('HoaTuoiController@getGiohang',['id' => $XX->Ma_hoa]) }}" @(hoa.Tinh_trang == false ? "disabled" : "")>
                        <span><b style="color:white">Đặt mua</b></span>
                    </a>
                </div>
            </div>
            <a href="{{action('HoaTuoiController@Chitietsanpham',['id' => $XX->Ma_hoa]) }}">            
            <h3 class="nn-product-box-name" style="color:#008848">
                        {{$XX->Ten_hoa}}                         
            </h3> 
            </a> 
    </a>           
    </div>
</div>
@endforeach
        {!! $layhoatheoXX->render() !!}
@endsection
