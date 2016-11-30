<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Cart;
class PaymentOnlineController extends Controller
{
	private $SECURE_SECRET = 'A3EFDFABA8653DF2342E8DAC29B51AF0';
	private $vpcURL = 'https://mtf.onepay.vn/onecomm-pay/vpc.op?';
	private $stringHashData = '';

	public function do(Request $req) {

		$Ma_KH = session()->get('Ma_KH');
		$kh = DB::table('khach_hang')->where('Ma_KH','=',$Ma_KH)->first();

		$text = '';
		foreach (Cart::content() as $gh) {
			$text = $text.$gh->name;
			if($gh->id != Cart::content()->last()->id)
			{
				$text = $text . " - ";
			}
		}		
		$params = [
			'vpc_Version' => '2',
			'vpc_Currency' => 'VND',
			'vpc_Command' => 'pay',
			'vpc_AccessCode' => 'D67342C2',
			'vpc_Merchant' => 'ONEPAY',
			'vpc_Locale' => 'vn',
			'vpc_ReturnURL' => url('ThanhtoanOnline/dr'),
			'vpc_MerchTxnRef' => md5(date('U')),
			'vpc_OrderInfo' => $text,
			'vpc_Amount' => Cart::total(),
			'vpc_TicketNo' => '',
			'AgainLink' => '',
			'Title' => 'onepay paygate',
			'vpc_SecureHash' => '',
			'vpc_SHIP_Street01' => $kh->Diachi,
			'vpc_SHIP_Provice' => '',
			'vpc_SHIP_City' => '',
			'vpc_SHIP_Country' => 'Vietnam',
			'vpc_Customer_Phone' => $kh->Sdt,
			'vpc_Customer_Email' => $kh->Email,
			'vpc_Customer_Id' => 'onepay_paygate',			
		];

		ksort ($params);

		$appendAmp = 0;
		foreach($params as $key => $value) {
		    if (strlen($value) > 0) {
		        if ($appendAmp == 0) {
		            $this->vpcURL .= urlencode($key) . '=' . urlencode($value);
		            $appendAmp = 1;
		        } else {
		            $this->vpcURL .= '&' . urlencode($key) . "=" . urlencode($value);
		        }
		        if ((strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
				    $this->stringHashData .= $key . "=" . $value . "&";
				}
		    }
		}

		$this->stringHashData = rtrim($this->stringHashData, "&");

		if (strlen($this->SECURE_SECRET) > 0) {
		    $this->vpcURL .= "&vpc_SecureHash=" . strtoupper(hash_hmac('SHA256', $this->stringHashData, pack('H*',$this->SECURE_SECRET)));
		}

		return redirect( $this->vpcURL );
	}

	public function dr(Request $req) {
		$cart = cart::content();
		$thongbao = $this->getResponseDescription($req->input('vpc_TxnResponseCode'));
		Cart::destroy();
		return view('HoaTuoi.Camon1',['thongbao' => $thongbao,'cart'=>$cart]);
	}

	private function getResponseDescription($responseCode) {
	
		switch ($responseCode) {
			case "0" :
				$result = "Giao dịch thành công - Approved";
				break;
			case "1" :
				$result = "Ngân hàng từ chối giao dịch - Bank Declined";
				break;
			case "3" :
				$result = "Mã đơn vị không tồn tại - Merchant not exist";
				break;
			case "4" :
				$result = "Không đúng access code - Invalid access code";
				break;
			case "5" :
				$result = "Số tiền không hợp lệ - Invalid amount";
				break;
			case "6" :
				$result = "Mã tiền tệ không tồn tại - Invalid currency code";
				break;
			case "7" :
				$result = "Lỗi không xác định - Unspecified Failure ";
				break;
			case "8" :
				$result = "Số thẻ không đúng - Invalid card Number";
				break;
			case "9" :
				$result = "Tên chủ thẻ không đúng - Invalid card name";
				break;
			case "10" :
				$result = "Thẻ hết hạn/Thẻ bị khóa - Expired Card";
				break;
			case "11" :
				$result = "Thẻ chưa đăng ký sử dụng dịch vụ - Card Not Registed Service(internet banking)";
				break;
			case "12" :
				$result = "Ngày phát hành/Hết hạn không đúng - Invalid card date";
				break;
			case "13" :
				$result = "Vượt quá hạn mức thanh toán - Exist Amount";
				break;
			case "21" :
				$result = "Số tiền không đủ để thanh toán - Insufficient fund";
				break;
			case "99" :
				$result = "Người sủ dụng hủy giao dịch - User cancel";
				break;
			default :
				$result = "Giao dịch thất bại - Failured";
		}
		return $result;
	}

}
