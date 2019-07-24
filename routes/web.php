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

Auth::routes();




Route::get('', function(){
	return view('welcome');
});

// Đăng ký thành viên
Route::get('register', 'Auth\RegisterController@getRegister')->name('register');
Route::post('register', 'Auth\RegisterController@postRegister')->name('register');
 
// Đăng nhập và xử lý đăng nhập
Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);

//Quên mật khẩu
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
 
// Đăng xuất
Route::get('logout', [ 'as' => 'logout', 'uses' => 'Auth\LogoutController@getLogout']);


//Gửi mail
Route::get('demo', function(){
	return view('demo');
});

Route::get('form',function(){
	return view('form');
});
Route::post('/message/send', ['uses' => 'FrontController@addFeedback', 'as' => 'front.fb']);


Route::group(['prefix'=>'admin'
	 ,'middleware'=>'CheckLogin'
],function(){
		Route::get('', 'HomeController@index');
		Route::get('view_all_admin','HomeController@index')->name('view_all_admin');
		Route::get('view_insert_admin','HomeController@view_insert')->name('view_insert_admin');
		Route::post('process_insert_admin','HomeController@process_insert')->name('process_insert_admin');
		Route::get('delete_admin/{ma_admin}','HomeController@delete')->name('delete_admin');
		Route::get('view_one_admin/{ma_admin}','HomeController@view_one')->name('view_one_admin');
		Route::post('process_update_admin','HomeController@update')->name('process_update_admin');
	
	Route::group(['prefix'=>'loai_phong'],function(){
		Route::get('','LoaiPhongController@view_all');
		Route::get('view_all_loai_phong','LoaiPhongController@view_all')->name('view_all_loai_phong');
		Route::get('view_insert_loai_phong','LoaiPhongController@view_insert')->name('view_insert_loai_phong');
		Route::post('process_insert_loai_phong','LoaiPhongController@process_insert')->name('process_insert_loai_phong');
		Route::get('delete_loai_phong/{ma_loai_phong}','LoaiPhongController@delete')->name('delete_loai_phong');
		Route::get('view_one_loai_phong/{ma_loai_phong}','LoaiPhongController@view_one')->name('view_one_loai_phong');
		Route::post('process_update_loai_phong','LoaiPhongController@update')->name('process_update_loai_phong');
	});

	Route::group(['prefix'=>'phong'],function(){
		Route::get('','PhongController@view_all');
		Route::get('view_all_phong','PhongController@view_all')->name('view_all_phong');
		Route::get('view_insert_phong','PhongController@view_insert')->name('view_insert_phong');
		Route::post('process_insert_phong','PhongController@process_insert_phong')->name('process_insert_phong');
		Route::get('view_one_phong/{ma_phong}','PhongController@view_one')->name('view_one_phong');
		Route::post('process_update_phong','PhongController@update')->name('process_update_phong');
	});

	Route::group(['prefix'=>'dat_phong'],function(){
		Route::get('','DatPhongController@view_dat_phong');
		Route::get('view_dat_phong','DatPhongController@view_dat_phong')->name('view_dat_phong');
		Route::post('view_phong','DatPhongController@view_phong')->name('view_phong');
		Route::post('dat_phong','DatPhongController@dat_phong')->name('dat_phong');
	});

	Route::group(['prefix'=>'hoa_don'],function(){
		Route::get('','hoaDonController@view_all');
		Route::get('view_all_hoa_don','hoaDonController@view_all')->name('view_all_hoa_don');
		Route::get('chua_nhan_phong','hoaDonController@chua_nhan_phong')->name('chua_nhan_phong');
		Route::get('da_thanh_toan','hoaDonController@da_thanh_toan')->name('da_thanh_toan');
		Route::get('dang_su_dung','hoaDonController@dang_su_dung')->name('dang_su_dung');
		Route::get('xac_nhan/{ma_hoa_don}','hoaDonController@xac_nhan')->name('xac_nhan');
		Route::get('dung_thue/{ma_hoa_don}','hoaDonController@dung_thue')->name('dung_thue');
		Route::get('thanh_toan/{ma_hoa_don}','hoaDonController@thanh_toan')->name('thanh_toan');
	});

	Route::group(['prefix'=>'thong_ke'],function(){
		Route::get('','chartController@view_all');
		Route::get('view_chart','chartController@orderYear')->name('view_chart');
		Route::get('view_month','chartController@orderMonth')->name('view_month');
	});
});

Route::get('/search', 'SearchController@index')->name('search');
Route::get('/search/action', 'SearchController@action')->name('search.action');

