<?php
/*=================CUSTOMER========================================== */
/** HOME */
Route::get('/home', 'Customer\HomeController@index')->name('home');
Route::get('/', 'Customer\HomeController@index')->name('home');
Route::prefix('home')->namespace('Customer')->group(function(){
    Route::get('/', 'HomeController@index');
    Route::resource('/categories', 'CategoryController', ['only' => ['index', 'show']]);
    Route::get('/gio-hang', 'CartController@index')->name('gio-hang');
});

/** PRODUCTS */
Route::get('/san-pham/chi-tiet-san-pham/{id}', 'Customer\ProductsController@getDetail')->name('chi-tiet-san-pham');
Route::get('/san-pham-theo-danh-muc/{id}', 'Customer\ProductsController@showProCate')->name('product-cate');
Route::get('/san-pham-theo-nguoi-ban/{id}', 'Customer\ProductsController@showProMer')->name('product-mer');

/**SEARCH */
Route::get('/ket-qua-tim-kiem', 'Customer\ProductsController@searchBox')->name('searchBox');
Route::get('/ket-qua-tim-kiem-nang-cao', 'Customer\ProductsController@search')->name('searchPrice');

/* CART*/
Route::get('/gio-hang/them-san-pham/{id}', 'Customer\CartController@addItem');
Route::get('/gio-hang/xoa-san-pham/{id}', 'Customer\CartController@destroy');
Route::get('/gio-hang/sua-sl-san-pham/', 'Customer\CartController@modifytocart');
Route::get('/gio-hang/tru-sl-san-pham/{id}', 'Customer\CartController@minustocart')->name('minus-to-cart');
Route::get('/gio-hang/tang-sl-san-pham/{id}', 'Customer\CartController@plustocart')->name('plus-to-cart');

/** AUTH CUSTOMER*/
Route::group(['middleware' => 'customer_guest'], function() {
    Route::get('/dang-ki', 'Customer\auth\RegisterController@showRegister')->name('customer.register');
    Route::post('/dang-ki', 'Customer\auth\RegisterController@register');
    Route::get('/dang-nhap', 'Customer\auth\LoginController@showLogin')->name('customer.login');
    Route::post('/dang-nhap', 'Customer\auth\LoginController@postLogin')->name('customer.postLogin');
    Route::get('tao-mat-khau-moi/{email}/{token?}', 'Customer\auth\ResetPasswordController@showResetForm')->name('customer.newPassword');
    Route::post('thiet-lap-mat-khau-moi/', 'Customer\auth\ResetPasswordController@resetPassword')->name('customer.saveNewPassword');
    Route::get('/quen-mat-khau', 'Customer\auth\ForgotPasswordController@showForgot')->name('customer.forgot');
    Route::post('/quen-mat-khau', 'Customer\auth\ForgotPasswordController@sendResetLinkEmail')->name('customer.sendReset');
    Route::post('/thay-doi-mat-khau-moi', 'Customer\auth\ResetPasswordController@showReset')->name('customer.reset');
});

/** PROFILE */
Route::group(['middleware' => 'customer_auth'], function (){
    Route::get('/thong-tin-ca-nhan', 'Customer\CustomerController@getProfile')->name('profile');
    Route::put('/updateProfile', 'Customer\CustomerController@updateProfile')->name('updateProfile');
    Route::get('/lich-su-mua-hang', 'Customer\CustomerController@getHistory')->name('history-order');
    Route::get('/chi-tiet-don-hang', 'Customer\CustomerController@getOrderDetail')->name('order-detail');
    Route::get('/thay-doi-mat-khau', 'Customer\CustomerController@getPassword')->name('password');
    Route::put('/updatePassword', 'Customer\CustomerController@updatePassword')->name('updatePassword');
    Route::post('/dang-xuat', 'Customer\auth\LoginController@getLogout')->name('dang-xuat');
    Route::get('/xac-nhan-dat-hang', 'Customer\CheckoutController@index')->name('checkout');
    Route::post('/checkout', 'Customer\CheckoutController@checkout');
    Route::get('dathangthanhcong', 'Customer\CheckoutController@dathangthanhcong')->name('dathangthanhcong');

});
//DANH GIA
Route::get('/danh-gia-nguoi-ban/{id_hd}/{id_c}/{id_m}', 'Customer\CustomerController@getRating')->name('getratingMerchant');
Route::post('/post-danh-gia-nguoi-ban','CustomerController@Rating')->name('rating');

/**=====================MERCHANT=============== */
Auth::routes();

Route::group(['prefix' => 'merchant','middleware' => 'merchant_guest'], function() {
    Route::get('/dang-nhap','Merchants\LoginController@showLoginForm')->name('merchant.login');
    Route::post('/dang-nhap','Merchants\LoginController@login');
    Route::get('/dang-ki','Merchants\RegisterController@showRegistrationForm')->name('merchant.register');
    Route::post('/dang-ki','Merchants\RegisterController@register');

    Route::get('/quen-mat-khau', 'Merchants\ForgotPasswordController@showForgot')->name('merchant.forgot');
    Route::post('/quen-mat-khau', 'Merchants\ForgotPasswordController@sendResetLinkEmail')->name('merchant.sendReset');
    Route::get('/tao-mat-khau-moi/{email}/{token?}', 'Merchants\ResetPasswordController@showResetForm')->name('merchant.newPassword');
    Route::post('/thiet-lap-mat-khau-moi', 'Merchants\ResetPasswordController@resetPassword')->name('merchant.saveNewPassword');
    Route::post('/thay-doi-mat-khau-moi', 'Merchants\ResetPasswordController@showReset')->name('customer.reset');
});
Route::group(['prefix' => 'merchant','middleware' => 'merchant_auth'], function(){
    Route::post('/dang-xuat', 'Merchants\LoginController@logout');
    Route::get('/','MerchantController@index')->name('merchant.dashboard');
    Route::get('/thong-tin-ca-nhan','MerchantController@ShowViewProfile');
    Route::post('/updateprofile','MerchantController@updateProfile')->name('merchant.updateProfile');
    Route::post('/updateinfo','MerchantController@updateProfile_Info')->name('merchant.updateinfo');
    Route::post('/changepassword','MerchantController@changePassword')->name('merchant.changepassword');
    Route::get('/mua-goi-tin','PaypalController@buy_post_form')->name('merchant.create_bill');
    Route::post('/paypal', array('as' => 'paypal','uses' => 'PaypalController@postPaymentWithpaypal',))->name('merchant.addmoney_paypal');
    Route::get('/paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));
    Route::post('/buy_post','MerchantController@create_bill');
    Route::get('/danh-sach-don-hang','MerchantController@showInvoiceList');
    Route::get('/loadinvoice_list/{stt}','MerchantController@getInvoiceList');
    Route::get('/detail_invoice','MerchantController@showDetailInvoice');
    Route::get('/update_invoice/{id_hd}/{stt}/{ghi_chu_m}','MerchantController@updateSttInvoice');
  //  Route::get('/danh-sach-mua-tin','MerchantController@showInvoicePostList');
    Route::get('/dang-tin','MerchantController@showFormPost')->name('merchant.create_post');
    Route::post('/dang-tin','MerchantController@create_post');
    Route::get('/ton-kho','MerchantController@showListPost');
    Route::get('/update_quantity_post',"MerchantController@updateQuantityProduct");
    Route::get('/del_quantity_post',"MerchantController@DeleteProduct");
    Route::get('/danh-sach-mua-tin',"MerchantController@showListBuyPost");
    Route::get('/thong-ke',"MerchantController@showStatistic")->name('merchant.getDataStatistic');
    Route::get('/statistic/{start_y}/{end_y}',"MerchantController@getStatistic");

});

Route::get('verifyc/{email}','Customer\auth\RegisterController@sendMailDone')->name('sendEmailCDone');
Route::get('verifyEmailFirst','Merchants\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
Route::get('verify/{email}','Merchants\RegisterController@sendMailDone')->name('sendEmailDone');
 Route::post('merchant-password/email','Merchants\ForgotPasswordController@sendResetLinkEmail')->name('merchant.password.email');
 Route::get('merchant-password/reset','Merchants\ResetPasswordController@showLinkRequestForm')->name('merchant.password.request');
 Route::post('merchant-password/reset','Merchants\ResetPasswordController@reset');
 Route::get('merchant-password/reset/{token}','Merchants\ResetPasswordController@showResetForm')->name('merchant.password.reset');


///webmaster

Route::group(['prefix' => 'webmaster','middleware' => 'webmaster_guest'], function() {
    Route::get('/login','Webmasters\LoginController@showLoginForm')->name('webmaster.login');
    Route::post('/login','Webmasters\LoginController@login');

});
Route::get('verify-webmaster/{email}','Webmasters\RegisterController@sendMailDone')->name('sendWebmasterEmailDone');

Route::group(['prefix' => 'webmaster','middleware' => 'webmaster_auth'], function () {
  Route::get('/themmoi','Webmasters\RegisterController@ThemMoi')->name('webmaster.register');
  Route::post('/themmoi','Webmasters\RegisterController@register')->name('webmaster.postregister');;
    Route::get('/','WebmasterController@index')->name('webmaster.index');
    Route::get('kich-hoat-merchant','MerchantController@kich_hoat_merchant')->name('kichhoatmerchant');
    Route::get('kich_hoat_merchant_id/{id}','MerchantController@kich_hoat_merchant_id')->name('kich_hoat_merchant_id');
    Route::get('qlnguoimua','CustomerController@index_admin')->name('quanlinguoimua');
    Route::get('qlnguoiban', 'MerchantController@index_admin')->name('quanlinguoiban');
    Route::get('quanliwebmaster','WebmasterController@index_webmaster')->name('quanliwebmaster');
    Route::get('xulykhoatk', 'TaiKhoanBiKhoaController@index')->name('xulykhoatk');
    Route::get('mo_khoa_merchant/{id}', 'TaiKhoanBiKhoaController@mokhoamerchant')->name('mo_khoa_merchant');
    Route::post('khoa_merchant', 'TaiKhoanBiKhoaController@khoamerchant')->name('khoa_merchant');
    Route::get('thong_tin_merchant_admin/{id}', 'MerchantController@thong_tin_merchant_admin')->name('thong_tin_merchant_admin');
    Route::get('thong_tin_customer_admin/{id}', 'CustomerController@thong_tin_customer_admin')->name('thong_tin_customer_admin');
    Route::get('quan_ly_danh_muc', 'DanhMucController@index')->name('quan-ly-danh-muc');
    Route::get('them_danh_muc', 'DanhMucController@insert')->name('them-danh-muc');
    Route::post('them_danh_muc', 'DanhMucController@postinsert')->name('them-danh-muc');
    Route::get('sua_danh_muc/{id}', 'DanhMucController@edit')->name('sua-danh-muc');
    Route::post('post_sua_danh_muc/{id}', 'DanhMucController@postedit')->name('post-sua-danh-muc');
    Route::get('xoa_danh_muc/{id}', 'DanhMucController@remove')->name('xoa-danh-muc');

    Route::get('quan_ly_goi_tin', 'GoiTinController@index')->name('quan-ly-goi-tin');
    Route::get('them_goi_tin', 'GoiTinController@insert')->name('them-goi-tin');
    Route::post('them_goi_tin', 'GoiTinController@postinsert')->name('them-goi-tin');
    Route::get('sua_goi_tin/{id}', 'GoiTinController@edit')->name('sua-goi-tin');
    Route::post('sua_goi_tin/{id}', 'GoiTinController@postedit')->name('sua-goi-tin');
    Route::get('xoa_goi_tin/{id}', 'GoiTinController@remove')->name('xoa-goi-tin');


    Route::get('suathongtin/{id}','WebmasterController@suathongtin')->name('suathongtinwebmaster');
    Route::post('suathongtin/{id}','WebmasterController@postsuathongtin')->name('postsuathongtinwebmaster');
    Route::post('suapassword/{id}','WebmasterController@postsuapassword')->name('postsuapasswordwebmaster');

    Route::get('NewWebmasterEmailDone/{id}/{email}','WebmasterController@NewWebmasterEmailDone')->name('NewWebmasterEmailDone');

    Route::get('tkdoanhthugoitin','PhieuThuController@ShowDoanhThuView')->name('doanhthugoitin');
    Route::post('tkdoanhthugoitin','PhieuThuController@GetDoanhThu')->name('getdoanhthugoitin');
    Route::get('tkdanhgia','WebmasterController@GetDanhGia')->name('getdanhgia');

    Route::get('xemtoanbodonhang','WebmasterController@GetDonHang')->name('getalldonhang');
    Route::get('/xemchitietdhwebmaster','WebmasterController@showDetailInvoice')->name('xemchitietdhwebmaster');
    Route::get('/xemchitietdhwithmwebmaster','WebmasterController@showDetailInvoiceM')->name('xemchitietdhwebmasterwithm');
    Route::get('/search-dh-tt','WebmasterController@laydonhangtheotrangthai')->name('searchdhstt');
});
