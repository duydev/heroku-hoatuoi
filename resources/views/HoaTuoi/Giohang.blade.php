
<link rel="stylesheet" type="text/css" href="{{ asset("Themes/Contents/css/nn-style1.css") }}"/>
@extends('Shared.LayoutUser')

@section('content')
	<h2>CHI TIẾT GIỎ HÀNG</h2>  
        @if(count($cart))     
        <table cellpadding="2" cellspacing="2" class="hoverTable" border="1">
            <tr bgcolor="#CCFFCC" style="background-color:#ffff99">
                <td colspan="7">
                    <div align="center" class="style3">
                        <span style="font-weight:bold;font-size:18px;">Danh sách các mặt hàng đã đặt</span>
                    </div>
                </td>
            </tr>
            <tr bgcolor="#CCFFCC" style="background-color:#ffff99">      
                <td width="80"><div align="center" class="style2"><strong>Mã mặt hàng</strong></div></td>      
                <td width="150"><div align="center" class="style2"><strong>Tên mặt hàng</strong></div></td>
                <td width="150"><div align="center" class="style2"><strong>Hình</strong></div></td>            
                <td width="75"><div align="center" class="style2"><strong>Số Lượng</strong></div></td>
                <td width="75"><div align="center" class="style2"><strong>Giá</strong></div></td>  
                <td width="75"><div align="center" class="style2"><strong>Thành tiền</strong></div></td>        
                <td width="120"><div align="center" class="style2"><strong>Thao tác</strong></div></td>
                
            </tr>           
            <!--<input type="hidden" name="_token" value="{{csrf_token()}}" />-->
            @foreach($cart as $item)           
            <tr>
                <td width="80"><div align="center"> {{$item->id}}</div></td>
                <td width="150"><div align="center">{{$item->name}}</div></td>
                <td width="150"><img src="{{ asset("Themes/Images/".$item->options->Hinh ) }}" width="100%" height="150" /></td>
                <td width="75"><div align="center"><input type="text" size="1" value="{{ $item->qty }}" class="qty" name="quantity"></div></td>
                <td width="50"><div align="right">{{number_format($item->price)}}</div></td> 
                <td width="50"><div align="right">{{number_format($item->price*$item->qty)}}</div></td>               
                <td width="120" >
                    <div align="center">
                        <a role="button" class="btn-default nn-color-white" href="{{action('HoaTuoiController@xoaGiohang',['id' => $item->rowid]) }}" @(hoa.Tinh_trang == false ? "disabled" : "")>
                        <span><b style="color:white">Xóa</b></span>
                        </a><br/>
                        <a class="btn-default nn-color-white updatecart" href="" @(hoa.Tinh_trang == false ? "disabled" : "") id ="{!! $item->rowid !!}">
                        <span><b style="color:white">Cập nhật</b></span>
                        </a>
                    </div>
               </td>          

            </tr>
            @endforeach
           
            <tr>               
                <td colspan="7" align="right">
                    Tổng cộng:{{number_format(Cart::total())}} VNĐ  
                </td>
            </tr>
            <tr>
                <td align="center">
                     <a role="button" class="btn-default nn-color-white" href="{{action('HoaTuoiController@Dathang') }}" @(hoa.Tinh_trang == false ? "disabled" : "")>
                        <span><b style="color:white">Đặt hàng</b></span>
                        </a>
                </td>
                <td align="center">
                    <a role="button" class="btn-default nn-color-white" href="{{action('HoaTuoiController@Huygiohang') }}" @(hoa.Tinh_trang == false ? "disabled" : "")>
                        <span><b style="color:white">Hủy giỏ hàng</b></span>
                        </a>
            </tr>
        </table>        
        @else
          Không có sản phẩm nào trong giỏ hàng!!!
    @endif
@endsection