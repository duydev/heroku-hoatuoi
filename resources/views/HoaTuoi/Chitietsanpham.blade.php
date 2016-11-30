@extends('Shared.LayoutUser')

@section('content')
	<div class="alert alert-success" id="success-alert" style="display:none">
	    <button type="button" class="close" data-dismiss="alert">x</button>
	    <strong>Thành công! </strong>
	    Đã thêm sản phẩm vào giỏ hàng
	</div>
    <script>
        $(document).ready(function () {
            // Khi nhan vao nut "Them vao gio hang"
            $("#btnGioHang").click(function (e) {
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
    <div>
        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
            <h3> THÔNG TIN CHI TIẾT HOA</h3>
            <div>

                <div style="width:40%; float:left; border-left: dotted 1px; border-color:azure">
                    <img src="{{asset("Themes/Images/".$Chitietsp->Anh_hoa) }}" width="100%" />
                </div>

                <div style="width:60%; float:left; padding:10px">

                    <h4 style="font-weight:bold">
                        Tên hoa:<span style="font-weight:bold;color:red">{{$Chitietsp->Ten_hoa}}</span>
                    </h4>

                    <h4 style="text-align:justify">
                        <span style="font-weight:bold"> Mô tả: </span>{{$Chitietsp->Mo_ta_chi_tiet}}
                    </h4>

                     <h4 style="font-weight:bold">
                        <p style="font-weight:bold">
                            Giá bán: <span style="color:red; font-size:16pt "> {{number_format($Chitietsp->Gia_ban,0)}} VNĐ </span>
                            <br />
                        </p>
                     </h4>

                    @if ($Chitietsp->Tinh_trang)
                    
                        <h4 style="font-weight:bold">Trình trạng: 
                            <span class="text-success" style="font-weight:bold">
                            <i class="fa fa-check" aria-hidden="true"></i>Còn Hàng
                            </span>
                        </h4>                
                    @else
                    
                        <h4 style="font-weight:bold">
                            Trình trạng: <span class="text-danger" style="font-weight:bold"><i class="fa fa-close" aria-hidden="true"></i>Hết Hàng</span>
                        </h4>

                    @endif              

                    
                    <div class="nn-product-box-actions">
                        <a role="button" id="btnGioHang" class="btn btn-success" href="{{action('HoaTuoiController@getGiohang',['id' => $Chitietsp->Ma_hoa]) }}" @(Model.Tinh_trang == false ? "disabled" : "")>
                            ĐẶT MUA
                        </a>
                    </div> 

                     <p style="font-size:18px" id="sdt">
                        Hỗ trợ đặt hàng nhanh qua điện thoại<br />
                        <i class="fa fa-phone-square fa-2x" aria-hidden="true"></i>    <span>0985 608060 / 08.62768186</span>
                    </p> 

                </div>
            
            </div>  

        </div>  
        <div>
            <h3>
                <img src="{{ asset("Themes/Contents/img/icon.png")}}" width="40" height="40" />
                CÁC SẢN PHẨM CÙNG DANH MỤC
                <div class="customNavigation pull-right">
                    <a class="btn prev"><i class="fa fa-angle-left fa-3x"></i></a>
                    <a class="btn next"><i class="fa fa-angle-right fa-3x" ></i></a>
                </div>
            </h3>
            <div id="owl-demo" class="owl-carousel owl-theme">
                @foreach($sanphamlienquan as $lq)
                    <div class="item">
                    <div class="nn-product-box text-center">
                        <a href="">
                            <div class="grow pic">
                                <img src="{{asset("Themes/Images/".$lq->Anh_hoa) }}" width="200" height="250" alt="" />
                            </div>
                            <h3 class="nn-product-box-name text-center" style="color:#008848">
                                {{$lq->Ten_hoa}}                    
                            </h3>
                            <div class="nn-product-box-price ">
                                {{number_format($lq->Gia_ban,0)}} VNĐ
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>   
    </div>
@endsection

