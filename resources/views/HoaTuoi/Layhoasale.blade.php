<div class="nn-home-banner">
    <div id="sidebar-slider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators" style="margin-bottom:20px">
            <li data-target="#sidebar-slider" data-slide-to="0" class="active"></li>
            <li data-target="#sidebar-slider" data-slide-to="1"></li>
            <li data-target="#sidebar-slider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">           
            @foreach ($giamgia as $sale)         
              
                <div class="item {{ $sale == $giamgia[0] ? "active" : ""  }}">
                    <a href="{{action('HoaTuoiController@Chitietsanpham',['id' => $sale->Ma_hoa]) }}">   
                        <img src="{{ asset("Themes/Images/".$sale->Anh_hoa) }}" class="slide-image"  />
                        <h3 class="nn-product-box-name text-center" style="color:#008848">
                            {{$sale->Ten_hoa}}
                        </h3>
                        </a>
                        <div class="nn-product-box-price text-center">
                            {{number_format($sale->Gia_ban,0)}} VNĐ
                        </div>
                    <div class="nn-product-box-actions text-center">
                         <a role="button" class="btn btnGioHang info" href="{{action('HoaTuoiController@getGiohang',['id' => $sale->Ma_hoa]) }}" @(hoa.Tinh_trang == false ? "disabled" : "")>
                        <span><b style="color:white">Đặt mua</b></span>
                        </a>
                    </div></div>
            @endforeach
        </div>
        <a class="left carousel-control" href="#sidebar-slider" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#sidebar-slider" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>