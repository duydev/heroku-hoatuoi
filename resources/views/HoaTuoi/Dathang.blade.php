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
    <link rel="stylesheet" type="text/css" href="{{ asset("Themes/Contents/css/font-awesome.min.css") }}"/>  
    <link rel="stylesheet" type="text/css" href="{{ asset("Themes/Contents/css/stepprogress.css") }}"/>   
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
                        <td width="50%" style="border:solid 3px;" class="radious_left" colspan="2"><a href="{{asset('/Dangky')}}"   style="text-decoration:none;color:#CCC">Đăng ký</a>
                        </td>                           
                        <td width="50%" style="border:solid 3px;" class="radious_right" colspan="2"><a href="{{asset('/Dangxuat')}}" style="text-decoration:none;color:#CCC">Đăng xuất</a>
                         </td>  
                    </tr>               
                @else(!session()->has('User'))              
                    <tr align="center" style="background-color: #DD006F; font-weight:bold;color:#CCC">
                        <td width="50%" style="border:solid 3px;" class="radious_left" colspan="2"><a href="{{asset('/Dangky')}}"   style="text-decoration:none;color:#CCC">Đăng ký</a>
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
<ul class="progressbar text-center" style="margin-top:20px ">
          <li class="active">Đăng nhập</li>
          <li class="active">Địa chỉ</li>
          <li>Thanh toán</li>          
  </ul>
    @if(count($cart))  
        <table cellpadding="2" cellspacing="2" class="hoverTable" border="1" style="float: right;width: 30%;margin-top: 20px;">
            <tr bgcolor="#CCFFCC" style="background-color:#ffff99">
                <td colspan="7">
                    <div align="center" class="style3">
                        <span style="font-weight:bold;font-size:18px;">Thông tin đơn hàng</span>
                    </div>
                </td>
            </tr>
            <tr bgcolor="#CCFFCC" style="background-color:#ffff99"> 
                <td width="150"><div align="center" class="style2"><strong>Tên mặt hàng</strong></div></td>                          
                <td width="75"><div align="center" class="style2"><strong>Số Lượng</strong></div></td>
                <td width="75"><div align="center" class="style2"><strong>Giá</strong></div></td>  
                <td width="75"><div align="center" class="style2"><strong>Thành tiền</strong></div>
                </td>      
            </tr>           
            <!--<input type="hidden" name="_token" value="{{csrf_token()}}" />-->
            @foreach($cart as $item)           
            <tr>                
                <td width="150"><div align="center">{{$item->name}}</div></td>
                <td width="75"><div align="center">{{ $item->qty }}</div></td>
                <td width="50"><div align="right">{{number_format($item->price)}}</div></td>
                <td width="50"><div align="right">{{number_format($item->price*$item->qty)}}</div></td>   
            </tr>
            @endforeach
           
            <tr>               
                <td colspan="7" align="right">
                    Tổng cộng:{{number_format(Cart::total())}} VNĐ  
                </td>
            </tr>            
        </table>
    <form method="POST" name="Themdonhang" action="{{ url( 'Dathang' ) }}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <table cellpadding="2" cellspacing="2" class="hoverTable" border="1" style="float: right;width: 68%;margin-top: 20px;margin-right: 20px;">
            <tr bgcolor="#CCFFCC" style="background-color:#ffff99">
                <td colspan="2">
                    <div align="center" class="style3">
                        <span style="font-weight:bold;font-size:18px;">Thông tin chi tiết đơn hàng</span>
                    </div>
                </td>               
            </tr>
            <tr bgcolor="#CCFFCC"> 
                <td width="20%"><div align="center" class="style2"><strong>Ngày giao hàng</strong></div></td>                          
                <td><input name="txtNgaygiao" type="date" size="40" onfocus="Focus(this)" onblur="Blur(this)"  id="datepicker">
                @if($errors->has('txtNgaygiao'))   
                    <span>
                        <strong style="color: red">{{$errors->first('txtNgaygiao')}}</strong>
                    </span>   
                @endif 
                </td>
            </tr>           
            <!--<input type="hidden" name="_token" value="{{csrf_token()}}" />-->
           <tr bgcolor="#CCFFCC"> 
                <td width="10%"><div align="center" class="style2"><strong>Tên người nhận</strong></div></td>                          
                <td>
                    <input name="txtNguoinhan" type="text" id="txtNguoinhan" size="40">
                    @if($errors->has('txtNguoinhan'))   
                    <span>
                        <strong style="color: red">{{$errors->first('txtNguoinhan')}}</strong>
                    </span>   
                    @endif 
                </td>
            </tr>
            <tr bgcolor="#CCFFCC"> 
                <td width="10%"><div align="center" class="style2"><strong>Nơi giao hàng</strong></div></td>                          
                <td>
                <input name="txtNoigiaohang" type="text" id="txtNoigiaohang" size="40">
                @if($errors->has('txtNoigiaohang'))   
                    <span>
                        <strong style="color: red">{{$errors->first('txtNoigiaohang')}}</strong>
                    </span>   
                @endif 
                </td>
            </tr>
            <tr>
                <td width="10%"><div align="center" class="style2"><strong>Ghi chú</strong></div></td>
                <td colspan="4"><textarea name="txtGhichu" cols="42" rows="5" id="txtGhichu"></textarea></td>
            </tr>     
            <tr>
                <td colspan="2">
                    <input id="submit" name="submit" type="submit" value="Tiếp tục" class="btn btn-default btnGioHang" style="width: 200px">
                </td>
            </tr>    
        </table>
    </form><!-- Form o day -->
    @endif    
</div>
    
    <div id="fb-root">
    </div>
    <script>
            (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1314191011958704";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</body>

<script type="text/javascript" src="{{ asset("Themes/Contents/Plugins/owl-carousel/owl.carousel.min.js") }}">    
</script>
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
 <script type='text/javascript'>
     window._sbzq || function (e) { e._sbzq = []; var t = e._sbzq; t.push(["_setAccount", 52948]); var n = e.location.protocol == "https:" ? "https:" : "http:"; var r = document.createElement("script"); r.type = "text/javascript"; r.async = true; r.src = n + "//static.subiz.com/public/js/loader.js"; var i = document.getElementsByTagName("script")[0]; i.parentNode.insertBefore(r, i) }(window);
     </script>
</html>

     

