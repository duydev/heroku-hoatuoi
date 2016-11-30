<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HoaTuoiController@Index');
Route::get('Hoatheochude/{id}','HoaTuoiController@Hoatheochude');
Route::get('Hoatheoxuatxu/{id}','HoaTuoiController@Hoatheoxuatxu');
Route::get('Chitietsanpham/{id}','HoaTuoiController@Chitietsanpham');

Route::get('Dangnhap','HoaTuoiController@getDangnhap');
Route::post('Post_Dangnhap','HoaTuoiController@postDangnhap');

Route::get('Dangky','HoaTuoiController@getDangky');
Route::post('Post_Dangky','HoaTuoiController@postDangky');

Route::get('Dangxuat','HoaTuoiController@Dangxuat');

Route::get('Gioithieu','HoaTuoiController@Gioithieu');

Route::get('Lienhe','HoaTuoiController@getLienhe');
Route::post('Guimail','HoaTuoiController@postMail');

Route::get('Tintuc','HoaTuoiController@Tintuc');

Route::get('Giohang/{id}','HoaTuoiController@getGiohang');

Route::get('Giohang','HoaTuoiController@showGiohang');

Route::get('Xoagiohang/{id}','HoaTuoiController@xoaGiohang');

Route::get('cap-nhat/{id}/{qty}',['as'=>'Capnhat','uses'=>'HoaTuoiController@Capnhat']);

Route::get('DatHang','HoaTuoiController@Huygiohang');

Route::get('Dathang','HoaTuoiController@Dathang');
Route::post('Dathang','HoaTuoiController@Themdonhang');

Route::get('Thanhtoan','HoaTuoiController@Thanhtoan');

Route::get('Camon','HoaTuoiController@Camon');


Route::get('ThanhtoanOnline/dr','PaymentOnlineController@dr');
Route::get('ThanhtoanOnline/do','PaymentOnlineController@do');