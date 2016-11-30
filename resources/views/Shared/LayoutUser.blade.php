<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel=" icon" href="{{asset("Themes/Contents/img/icon.png")}}"/>     
    <title>Cửa hàng Hoa tươi H & T</title>
    <link href="Contents/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <!--jquery first, bootstrap later-->
    <script type="text/javascript" src="{{ asset("Themes/Contents/js/jquery-1.10.2.min.js") }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="{{ asset("Themes/Contents/js/bootstrap.js") }}"></script>	
    <script type="text/javascript" src="{{ asset("Themes/Contents/js/capnhat.js") }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset("Themes/Contents/css/bootstrap.min.css") }}"/> 
    <link rel="stylesheet" type="text/css" href="{{ asset("Themes/Contents/css/nn-style.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("Themes/Contents/css/nn-style1.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("Themes/Contents/css/login-style.css") }}"/>

     <link href="{{ asset("Themes/Contents/Plugins/owl-carousel/owl.carousel.css")}}" rel="stylesheet" />
    <link href="{{ asset("Themes/Contents/Plugins/owl-carousel/owl.transitions.css")}}" rel="stylesheet" />
    <link href="{{ asset("Themes/Contents/Plugins/owl-carousel/owl.theme.css")}}" rel="stylesheet" />
   	<link rel="stylesheet" type="text/css" href="{{ asset("Themes/Contents/css/font-awesome.min.css") }}"/>     
    <style style="text/css">
    .hoverTable{
        width:100%; 
        border-collapse:collapse; 
    }
    .hoverTable td{ 
        padding:7px; border:#4e95f4 1px solid;
    }
    /* Define the default color for all the table rows */
    .hoverTable tr{
        background: #b8d1f3;
    }
    /* Define the hover highlight color for the table row */
    .hoverTable tr:hover {
          background-color: #ffff99;
    }   
</style>
   	
</head>

<body>
<div class="container">
    <header class="nn-header">
            <!--end logo--><!--end search box--><!--end cart box-->            
            <div style="float:left; display:block"> <a href="{{asset('/')}}"><img src="{{ asset("Themes/Contents/img/logo.png") }}" width="239" height="87">            
            </a></div>
            <table width="40%" height="100%" border="0" cellspacing="0" cellpadding="0" style="float:right; color:#CCC" bordercolor="#FFFFFF">
            	@if(session()->has('User'))            	
	                <tr align="center" style="background-color: #DD006F; font-weight:bold;color:#CCC">
	                    <td width="50%" style="border:solid 3px;" class="radious_left" colspan="2"><a href="{{asset('/Dangky')}}" 	style="text-decoration:none;color:#CCC">Đăng ký</a>
	                    </td> 		                    
		                <td width="50%" style="border:solid 3px;" class="radious_right" colspan="2"><a href="{{asset('/Dangxuat')}}" style="text-decoration:none;color:#CCC">Đăng xuất</a>
		                 </td>  
	                </tr>	            
	            @else(!session()->has('User'))	            
	            	<tr align="center" style="background-color: #DD006F; font-weight:bold;color:#CCC">
	                    <td width="50%" style="border:solid 3px;" class="radious_left" colspan="2"><a href="{{asset('/Dangky')}}" 	style="text-decoration:none;color:#CCC">Đăng ký</a>
	                    </td> 		                    
		                <td width="50%" style="border:solid 3px;" class="radious_right" colspan="2"><a href="{{asset('/Dangnhap')}}" style="text-decoration:none;color:#CCC">Đăng nhập</a>
		                 </td>  
	                </tr>	           
	            @endif
                <tr>
                    <td colspan="2" style="color:#DD4800; font-weight:bold" align="center">
                        <span>GIỜ GIAO HOA</span><br />
                        <p>7.00AM - 7.00 PM</p>
                    </td>
                    <td colspan="2" style="color:#008040; font-weight:bold" align="center">
                        <span>GỌI CHO CHÚNG TÔI</span><br />
                        <p>(08) 3810 7373</p>
                    </td>
                </tr>
            </table>
           
            <div style="float:right; display:block">
                <table style="float:right; margin-right:50px" border="0">
                    <tr>
                        <td height="37" valign="top"><div align="center" class="style5"><span style="font-weight:bold;color:#060;font-size:18px">Có thể thanh toán bằng</span></div></td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <div align="center">                                
                                <img src="{{ asset("Themes/Contents/img/IconCardMasterCard.gif") }}" width="37" height="23">                                
                               <img src="{{ asset("Themes/Contents/img/IconCardVisa.gif")}}" width="37" height="23"> 
                                <img src="{{ asset("Themes/Contents/img/IconCardVisaE.gif") }}" width="37" height="23">
                            </div>
                        </td>
                    </tr>
                </table>

            </div>
    </header>  
        <div class="navbar navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{asset('/')}}"><span class="glyphicon glyphicon-home "></span></a>
            </div>
            <div class="navbar-collapse collapse js-navbar-collapse" style="background-color:#FFF">
                <ul class="nav navbar-nav">
                    <li><a href="{{asset('/')}}">TRANG CHỦ</a></li>
                    <li><a href="{{asset('/Gioithieu')}}">GIỚI THIỆU</a></li>                    
                    <li><a href="{{asset('/Lienhe')}}">LIÊN HỆ</a></li>                   
                    <li><a href="{{asset('/Tintuc')}}">TIN TỨC</a></li> 
                    <li><a href="{{asset('/Giohang')}}">GIỎ HÀNG</a></li>
                    <li style="float: right;margin-top: 15px">
                    	<marquee behavior="scroll" width="340px" style="display: inline-block;font-weight:bold">{{session()->get('User')}}</marquee>
                    </li>                  
                    
                </ul>

                <form role="search" style="width:200px; float:right">
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control" placeholder="Tìm kiếm" style="float:right" />
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search" style="float:right"></span>
                            </button>
                        </span>
                    </div>
                </form>
            </div>              
            </div>
    <div class="container row">
    	<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">

        	<div class="nn-block" style="display: inline;">
            	<div class="nn-megamenu-sidebar-title" style="background-color:#008040"><i class="glyphicon glyphicon-list"></i><h2>DANH MỤC</h2>                        
                </div>                   
                @include('HoaTuoi.Danhmuc',[ 'danhmuc' => $danhmuc ])
            </div><!--end block category-->

            <div class="nn-block" style="display: inline;">
                <div class="nn-megamenu-sidebar-title" style="background-color:#008040"><i class="glyphicon glyphicon-list"></i><h2>XUẤT XỨ</h2>                        
                </div>             
                @include('HoaTuoi.Xuatxu',[ 'xuatxu' => $xuatxu ])
               
            </div> 

            <div class="nn-block" style="display: inline;">
           		<div class="nn-megamenu-sidebar-title" style="background-color: #008040"><i class="glyphicon glyphicon-tags"></i><h2>Giảm giá</h2></div>
                <div class="nn-product-box">      
                    @include('HoaTuoi.Layhoasale',[ 'giamgia' => $giamgia ])
                </div>                           
            </div> 

        </div>
        
        <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">                
            <div>
                    @yield("content")                  
            </div>                
        </div>   

    </div><!--end left-sidebar-->                  
                
   


</div>
   <div class="ma-footer-static">
            <div class="container">
                <div class="footer-static">
                    <div class="row" style="background-color:#CCC">
                        <div class="f-col f-col-3 col-sm-6 col-md-4 col-sms-6 col-smb-12">
                            <div class="img-logo"><a href="{{asset('/')}}"><img src={{ asset("Themes/Contents/img/logo.png") }}></a></div>
                            <div class="footer-static-content ">
                                <h3>THÔNG TIN LIÊN HỆ</h3>
                                <p style="font-weight:bold">Cửa hàng hoa tươi, Shop hoa tươi online</p>
                                <p>
                                    Công ty TNHH H & T - 475A Điện Biên Phủ, P25, Quận Bình Thạnh,TP HCM.<br />

                                    Giấy phép/MST: 0305952229 do Sở KHDTHCM cấp ngày 28/09/2008

                                    Ông: ABC đại diện pháp luật.<br />

                                    Phone: 08.62768186 - 0985 608060;<br />
                                    Email: hoatuoisaigon@gmail.com


                                </p>
                            </div>
                        </div>
                        <div class="f-col f-col-4 col-sm-6 col-md-2 col-sms-6 col-smb-12">
                            <div class="footer-static-title">
                                <h3>DỊCH VỤ</h3>
                            </div>
                            <div class="footer-static-content">
                                <ul>
                                    <li class="first"><a href="{{asset('/Gioithieu')}}">Giới Thiệu</a></li>
                                    <li><a href="#">Giỏ Hàng</a></li>
                                    <li><a href="#">Thanh Toán</a></li>
                                    <li class="last"><a href="{{asset('/Tintuc')}}"> Tin Tức</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="f-col f-col-5 col-sm-6 col-md-2 col-sms-6 col-smb-12">
                            <div class="footer-static-title">
                                <h3>HỖ TRỢ</h3>
                            </div>
                            <div class="footer-static-content ">
                                <ul>
                                    <li class="first"><a href="{{asset('/Dangky')}}">Tài Khoản</a></li>
                                    <li class="last"><a href="{{asset('/Lienhe')}}">Liên Hệ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="f-col f-col-3 col-sm-6 col-md-4 col-sms-6 col-smb-12">
                            <div class="footer-static-title ">
                                <h3>FANPAGE HOA TƯƠI H & T</h3>
                            </div>
                            <div class="footer-static-content ">
                                <div class="fb-page"
                                     data-href="https://www.facebook.com/C%C3%B4ng-ty-Hoa-t%C6%B0%C6%A1i-H-T-329486594090491/"
                                     data-width="340"
                                     data-hide-cover="false"
                                     data-show-facepile="false"
                                     data-show-posts="false"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<div id="fb-root"></div>
    <script>
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1314191011958704";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>

<script type="text/javascript" src="{{ asset("Themes/Contents/Plugins/owl-carousel/owl.carousel.min.js") }}"></script>
<script>
        $(document).ready(function () {

            var thoigianchay = 2 * 1000;

            var owl = $("#owl-demo");

            owl.owlCarousel({
                items: 3, //10 items above 1000px browser width
                //itemsDesktop: [1000, 5], //5 items between 1000px and 901px
                //itemsDesktopSmall: [900, 3], // betweem 900px and 601px
                //itemsTablet: [600, 2], //2 items between 600 and 0
                //itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option
            });

            // Custom Navigation Events
            $(".next").click(function () {
                owl.trigger('owl.next');
            })
            $(".prev").click(function () {
                owl.trigger('owl.prev');
            })
            owl.trigger('owl.play', thoigianchay);

            $(".owl-item").hover(function () {
                owl.trigger('owl.stop');
            }, function () {
                owl.trigger('owl.play', thoigianchay);
            });

        });
    </script>
 <script type='text/javascript'>window._sbzq || function (e) { e._sbzq = []; var t = e._sbzq; t.push(["_setAccount", 52948]); var n = e.location.protocol == "https:" ? "https:" : "http:"; var r = document.createElement("script"); r.type = "text/javascript"; r.async = true; r.src = n + "//static.subiz.com/public/js/loader.js"; var i = document.getElementsByTagName("script")[0]; i.parentNode.insertBefore(r, i) }(window);</script>
</html>
