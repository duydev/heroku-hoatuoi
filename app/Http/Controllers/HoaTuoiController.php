<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\DangnhapRequest;
use App\Http\Requests\DangkyRequest;
use App\Http\Requests\LienheRequest;
use App\Http\Requests\Dathang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Mail;
use Cart;
use App\Mail\Reminder;
use Session;
use App\HoaTuoi;
use App\ChuDe;
use App\Don_dat_hang;


class HoaTuoiController extends Controller {
	 


	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	
	public function __construct()
	{
		$this->middleware('guest');
	}




	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function Index()
	{		
		$banner = DB::table('banner')->get();
		$danhmuc = DB::table('chu_de')->orderBy('Ma_CD', 'asc')->take(5)->get();
		$xuatxu = DB::table('xuat_xu')->orderBy('Ma_DD', 'asc')->take(5)->get();
		$giamgia = DB::table('hoa_tuoi')->orderBy('Giam_gia', 'desc')->take(4)->get();
		$layhoamoi = DB::table('hoa_tuoi')->orderBy('Ngay_cap_nhat','desc')->take(9)->get();				
		return view('Index',['banner' => $banner,'danhmuc' =>$danhmuc,'xuatxu' => $xuatxu,'giamgia' =>$giamgia,'layhoamoi' =>$layhoamoi]);
	}
	public function Hoatheochude($id)
	{
		$danhmuc = DB::table('chu_de')->orderBy('Ma_CD', 'asc')->take(5)->get();
		$xuatxu = DB::table('xuat_xu')->orderBy('Ma_DD', 'asc')->take(5)->get();
		$giamgia = DB::table('hoa_tuoi')->orderBy('Giam_gia', 'desc')->take(4)->get();
		$layhoatheoCD = DB::table('hoa_tuoi')->where('Ma_CD', '=', $id)->paginate(6);
		return view('HoaTuoi.Hoatheochude',['danhmuc' =>$danhmuc,'xuatxu' => $xuatxu,'giamgia' =>$giamgia,'layhoatheoCD' => $layhoatheoCD]);
	}
	public function Hoatheoxuatxu($id)
	{
		$danhmuc = DB::table('chu_de')->orderBy('Ma_CD', 'asc')->take(5)->get();
		$xuatxu = DB::table('xuat_xu')->orderBy('Ma_DD', 'asc')->take(5)->get();
		$giamgia = DB::table('hoa_tuoi')->orderBy('Giam_gia', 'desc')->take(4)->get();
		$layhoatheoXX = DB::table('hoa_tuoi')->where('Ma_DD', '=', $id)->paginate(9);
		return view('HoaTuoi.Hoatheoxuatxu',['danhmuc' =>$danhmuc,'xuatxu' => $xuatxu,'giamgia' =>$giamgia,'layhoatheoXX' => $layhoatheoXX]);
	}
	public function Chitietsanpham($id)
	{
		$danhmuc = DB::table('chu_de')->orderBy('Ma_CD', 'asc')->take(5)->get();
		$xuatxu = DB::table('xuat_xu')->orderBy('Ma_DD', 'asc')->take(5)->get();
		$giamgia = DB::table('hoa_tuoi')->orderBy('Giam_gia', 'desc')->take(4)->get();

		// Lay chi tiet san pham theo Ma_hoa
		$Chitietsp = HoaTuoi::find($id);

		// Lay san pham lien quan cung chu de
		$sanphamlienquan = $Chitietsp->chude->hoatuoi->all();
		
		return view('HoaTuoi.Chitietsanpham',['danhmuc' =>$danhmuc,'xuatxu' => $xuatxu,'giamgia' =>$giamgia,'Chitietsp' => $Chitietsp,'sanphamlienquan' =>$sanphamlienquan]);
	}
	function getDangnhap()
	{
		$banner = DB::table('banner')->get();
		$danhmuc = DB::table('chu_de')->orderBy('Ma_CD', 'asc')->take(5)->get();
		$xuatxu = DB::table('xuat_xu')->orderBy('Ma_DD', 'asc')->take(5)->get();
		$giamgia = DB::table('hoa_tuoi')->orderBy('Giam_gia', 'desc')->take(4)->get();
		return view('HoaTuoi.Dangnhap',['banner' => $banner,'danhmuc' =>$danhmuc,'xuatxu' => $xuatxu,'giamgia' =>$giamgia]);
	}
	function postDangnhap(DangnhapRequest $request)
	{
		$Username = $request->input('txtUser');
		$Pass = $request->input('txtPass');	

		$checkLogin = DB::table('khach_hang')->where(['Tai_khoan'=>$Username,'Mat_khau'=>$Pass])->first()->Ma_KH;			
		if(count($checkLogin) >0)
		{				
			if ($request->session()->has('Thongbao')) {
    			$request->session()->forget('Thongbao');
			}
			if (session()->has('Thongbao1')) {
    			session()->forget('Thongbao1');
			}	
			session()->put('Ma_KH',$checkLogin);		
			$xinchao = 	$request->session()->put('User','Đăng nhập thành công! Chào mừng khách đến cửa hàng Hoa tươi H & T.');		
			echo "<script language='javascript'>location.href='/Giohang';</script>";
		}
		else
		{
			$request->session()->put('Thongbao', 'Đăng nhập thất bại. Vui lòng kiểm tra Username hoặc Password!');
			echo "<script language='javascript'>location.href='/Dangnhap';</script>";
		}
	}
	function getDangky()
	{
		$banner = DB::table('banner')->get();
		$danhmuc = DB::table('chu_de')->orderBy('Ma_CD', 'asc')->take(5)->get();
		$xuatxu = DB::table('xuat_xu')->orderBy('Ma_DD', 'asc')->take(5)->get();
		$giamgia = DB::table('hoa_tuoi')->orderBy('Giam_gia', 'desc')->take(4)->get();
		return view('HoaTuoi.Dangky',['banner' => $banner,'danhmuc' =>$danhmuc,'xuatxu' => $xuatxu,'giamgia' =>$giamgia]);
	}
	function postDangky(DangkyRequest $request)
	{
		$txtName = $request->input('txtName');
		$txtUser = $request->input('txtUser');		
		$txtPass = $request->input('txtPass');
		$txtEmail = $request->input('txtEmail');
		$txtAddress = $request->input('txtAddress');
		$txtNum = $request->input('txtNum');
		$checkLogin = DB::table('khach_hang')->insert(['Ten_KH'=>$txtName,'Tai_khoan'=>$txtUser,'Mat_khau'=>$txtPass,'Email'=>$txtEmail,'Diachi'=>$txtAddress,'Sdt'=>$txtNum]);
		if(count($checkLogin) >0)		
		{
			$request->session()->put('Thongbao1', 'Đăng ký thành công! Bạn muốn đăng nhập tài khoản ngay?');
			echo "<script language='javascript'>location.href='/Dangky';</script>";
		}	 
	}		
	
	function Dangxuat()
	{
		if (session()->has('User')) {
    			session()->forget('User');    			
		}
		echo "<script language='javascript'>location.href='/';</script>";
	}

	function Gioithieu()
	{
		$banner = DB::table('banner')->get();
		$danhmuc = DB::table('chu_de')->orderBy('Ma_CD', 'asc')->take(5)->get();
		$xuatxu = DB::table('xuat_xu')->orderBy('Ma_DD', 'asc')->take(5)->get();
		$giamgia = DB::table('hoa_tuoi')->orderBy('Giam_gia', 'desc')->take(4)->get();
		return view('HoaTuoi.Gioithieu',['banner' => $banner,'danhmuc' =>$danhmuc,'xuatxu' => $xuatxu,'giamgia' =>$giamgia]);
	}
	function getLienhe()
	{
		$banner = DB::table('banner')->get();
		$danhmuc = DB::table('chu_de')->orderBy('Ma_CD', 'asc')->take(5)->get();
		$xuatxu = DB::table('xuat_xu')->orderBy('Ma_DD', 'asc')->take(5)->get();
		$giamgia = DB::table('hoa_tuoi')->orderBy('Giam_gia', 'desc')->take(4)->get();
		return view('HoaTuoi.Lienhe',['banner' => $banner,'danhmuc' =>$danhmuc,'xuatxu' => $xuatxu,'giamgia' =>$giamgia]);
	}
	public function Tintuc()
	{		
		$banner = DB::table('banner')->get();
		$danhmuc = DB::table('chu_de')->orderBy('Ma_CD', 'asc')->take(5)->get();
		$xuatxu = DB::table('xuat_xu')->orderBy('Ma_DD', 'asc')->take(5)->get();
		$giamgia = DB::table('hoa_tuoi')->orderBy('Giam_gia', 'desc')->take(4)->get();
		$layhoamoi = DB::table('hoa_tuoi')->orderBy('Ngay_cap_nhat','desc')->take(9)->get();				
		return view('HoaTuoi.Tintuc',['banner' => $banner,'danhmuc' =>$danhmuc,'xuatxu' => $xuatxu,'giamgia' =>$giamgia,'layhoamoi' =>$layhoamoi]);
	}
	public function postMail(LienheRequest $request)
	{				
		$data = array(
			'txtName' => $request->txtName,
			'txtTitle' => $request->txtTitle,
			'txtEmail'=> $request->txtEmail,
			'txtContent'=> $request->txtContent
			);
		Mail::send('HoaTuoi.Mailfb', $data ,function($message) use ($data){
				$message->from($data['txtEmail']);
				$message->to('thanhnhan260594@gmail.com');
				$message->subject($data['txtTitle']);
		});	
		Session::flash('thanhcong','Email của bạn đã được gửi!');
		return redirect('/Lienhe');
	}
	public function getGiohang($id)
	{				       	
	        $banner = DB::table('banner')->get();
			$danhmuc = DB::table('chu_de')->orderBy('Ma_CD', 'asc')->take(5)->get();
			$xuatxu = DB::table('xuat_xu')->orderBy('Ma_DD', 'asc')->take(5)->get();
			$giamgia = DB::table('hoa_tuoi')->orderBy('Giam_gia', 'desc')->take(4)->get();
			$layhoamoi = DB::table('hoa_tuoi')->orderBy('Ngay_cap_nhat','desc')->take(9)->get();
	        $product = HoaTuoi::findorFail($id);
	        Cart::add(array('id'=>$product->Ma_hoa,
							'name'=> $product->Ten_hoa,							
							'qty'=> 1,
							'price'=>$product->Gia_ban,							
							'options' => ['Hinh'=>$product->Anh_hoa,])
	        			);
	        Cart::total();
			$cart = Cart::content();			
		return view('HoaTuoi.Giohang',['banner' => $banner,'danhmuc' =>$danhmuc,'xuatxu' => $xuatxu,'giamgia' =>$giamgia,'layhoamoi' =>$layhoamoi,'cart'=>$cart]);
	}
	public function showGiohang()
	{
		$banner = DB::table('banner')->get();
		$danhmuc = DB::table('chu_de')->orderBy('Ma_CD', 'asc')->take(5)->get();
		$xuatxu = DB::table('xuat_xu')->orderBy('Ma_DD', 'asc')->take(5)->get();
		$giamgia = DB::table('hoa_tuoi')->orderBy('Giam_gia', 'desc')->take(4)->get();
		$layhoamoi = DB::table('hoa_tuoi')->orderBy('Ngay_cap_nhat','desc')->take(9)->get();
		$cart = Cart::content();
		return view('HoaTuoi.Giohang',['banner' => $banner,'danhmuc' =>$danhmuc,'xuatxu' => $xuatxu,'giamgia' =>$giamgia,'layhoamoi' =>$layhoamoi,'cart'=>$cart]);
	}	
	public function xoaGiohang($id)
	{
		$banner = DB::table('banner')->get();
		$danhmuc = DB::table('chu_de')->orderBy('Ma_CD', 'asc')->take(5)->get();
		$xuatxu = DB::table('xuat_xu')->orderBy('Ma_DD', 'asc')->take(5)->get();
		$giamgia = DB::table('hoa_tuoi')->orderBy('Giam_gia', 'desc')->take(4)->get();
		$layhoamoi = DB::table('hoa_tuoi')->orderBy('Ngay_cap_nhat','desc')->take(9)->get();
		Cart::remove($id);
		$cart = Cart::content();
		return view('HoaTuoi.Giohang',['banner' => $banner,'danhmuc' =>$danhmuc,'xuatxu' => $xuatxu,'giamgia' =>$giamgia,'layhoamoi' =>$layhoamoi,'cart'=>$cart]);
	}
	public function Capnhat(Request $request)
	{
		if($request->ajax()){
			$id = $request->get('id');
			$qty = $request->get('qty');
			Cart::update($id,$qty);
			return "oke";
		}
		else
		{
			return "Fail";
		}
	}
	
	public function Huygiohang()
	{
		$banner = DB::table('banner')->get();
		$danhmuc = DB::table('chu_de')->orderBy('Ma_CD', 'asc')->take(5)->get();
		$xuatxu = DB::table('xuat_xu')->orderBy('Ma_DD', 'asc')->take(5)->get();
		$giamgia = DB::table('hoa_tuoi')->orderBy('Giam_gia', 'desc')->take(4)->get();
		$layhoamoi = DB::table('hoa_tuoi')->orderBy('Ngay_cap_nhat','desc')->take(9)->get();
		Cart::destroy();
		$cart = Cart::content();
		return view('HoaTuoi.Giohang',['banner' => $banner,'danhmuc' =>$danhmuc,'xuatxu' => $xuatxu,'giamgia' =>$giamgia,'layhoamoi' =>$layhoamoi,'cart'=>$cart]);
	}

	public function Dathang()
	{
		$banner = DB::table('banner')->get();
		$danhmuc = DB::table('chu_de')->orderBy('Ma_CD', 'asc')->take(5)->get();
		$xuatxu = DB::table('xuat_xu')->orderBy('Ma_DD', 'asc')->take(5)->get();
		$giamgia = DB::table('hoa_tuoi')->orderBy('Giam_gia', 'desc')->take(4)->get();
		$layhoamoi = DB::table('hoa_tuoi')->orderBy('Ngay_cap_nhat','desc')->take(9)->get();
		$cart = Cart::content();
		if (session()->has('User')) {
    			return view('HoaTuoi.Dathang',['banner' => $banner,'danhmuc' =>$danhmuc,'xuatxu' => $xuatxu,'giamgia' =>$giamgia,'cart'=>$cart]);
			}
		else
		{
				return view('HoaTuoi.Dangnhap',['banner' => $banner,'danhmuc' =>$danhmuc,'xuatxu' => $xuatxu,'giamgia' =>$giamgia]);
				echo "<script language='javascript'>location.href='/Giohang';</script>";
		}
	}
	public function Themdonhang(Dathang $request)
	{
		$Nguoidat = session()->get('Ma_KH');
		$k = date('U')."_".$Nguoidat;					
		$Ngaydat = date('Y-m-d');
		$Ngaygiao = $request->input('txtNgaygiao');
		$Tennguoinhan = $request->input('txtNguoinhan');
		$Diadiem = $request->input('txtNoigiaohang');
		$Ghichu = $request->input('txtGhichu');  		
		$dathang = DB::table('don_dat_hang')->insert([
			'Ma_DDH'		  => $k,
			'Ma_KH'           => $Nguoidat,
			'Ngay_dat'        => $Ngaydat,
			'Ngay_giao'       => $Ngaygiao,
			'TenNguoiNhan'    => $Tennguoinhan,
			'DiaDiemGiaoHang' => $Diadiem,
			'GhiChu'          => $Ghichu
		]);
		if(count($dathang) > 0)
		{
			$cart = Cart::content();
			foreach (Cart::content() as $row) {
				$Gia = $row->price * $row->qty;
				$themchitietDH = DB::table('chi_tiet_ddh')->insert([
				'Ma_DDH'		  =>$k,
				'Ma_hoa'		  =>$row->id,
				'So_luong'		  =>$row->qty,
				'Don_gia'		  =>$Gia			
				]);
			}
		}

		echo "<script language='javascript'>location.href='/Thanhtoan';</script>";
	}
	public function Thanhtoan()
	{
		$cart = Cart::content();
		return view('HoaTuoi.Thanhtoan',['cart'=>$cart]);
	}
	public function Camon()
	{
		$cart = Cart::content();
		return view('HoaTuoi.Camon',['cart'=>$cart]);
	}
}

