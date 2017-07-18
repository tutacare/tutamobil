<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//auth facebook
Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
// auth
// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
$this->get('logout', 'Auth\AuthController@logout');

// Password Reset Routes...
$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
$this->post('password/reset', 'Auth\PasswordController@reset');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');
Route::get('register/verify/{confirmationCode}', 'Auth\AuthController@confirm');
Route::post('send/confirmation-code', 'Auth\AuthController@postCodeConfirm');
// end auth

//beranda
Route::get('/', 'HomeController@index');
//spesifikasi mobil baru
Route::post('/spesifikasi-mobil-baru', 'HomeController@spesifikasiMobilBaru');
Route::post('/spesifikasi-mobil-baru-credit', 'HomeController@spesifikasiMobilBaruCredit');
Route::get('/mobil-baru/{city}/{slug}', 'HomeController@getSpecMobilBaru');
Route::get('api/credit-simulation/{hargamobil}/{inputdp}', 'HomeController@creditSimulation');
//detail mobil bekas
Route::get('/mobil-bekas/{slug}', 'HomeController@detailMobilBekas');

//mobil baru list
Route::get('/mobil-baru', 'HomeController@mobilBaru');
Route::get('/simulasi-kredit', 'HomeController@homeSimulasiKredit');

Route::group(['namespace' => 'Beranda'], function() {
//perbandingan
Route::resource('/perbandingan', 'PerbandinganController');
});

//news
Route::get('/news', 'HomeController@News');
//news_search
Route::get('/news/search/key', 'HomeController@searchNews');
//news_category
Route::get('/news/category/{slug}', 'HomeController@categoryNews');
//detail news
Route::get('/news/{slug}', 'HomeController@detailNews');

//menampilkan gambar mobil baru
Route::get('img/mobil-baru/{file}', function($file = null)
{
    return Mytuta::readFile($file,'mobil-baru');
});
//menampilkan gambar mobil bekas
Route::get('img/mobil-bekas/{file}', function($file = null)
{
    return Mytuta::readFile($file,'mobilbekas');
});
//menampilkan gambar gallery
Route::get('img/gallery/{file}', function($file = null)
{
    return Mytuta::readFile($file,'gallery');
});
//menampilkan gambar interior_exterior
Route::get('img/interior/{file}', function($file = null)
{
    return Mytuta::readFile($file,'interior');
});
//menampilkan gambar keamanan_kelengkapan
Route::get('img/keamanan/{file}', function($file = null)
{
    return Mytuta::readFile($file,'keamanan');
});
// menampilkan gambar post
Route::get('img/post/{file}', function($file = null)
{
    return Mytuta::readFile($file,'post');
});

Route::group(['namespace' => 'Api'], function() {
  Route::get('api/getmerek/{city}', 'ApiController@getMerek');
 Route::get('api/getdesign/{city}/{merek}', 'ApiController@getDesign');
 Route::get('api/gettipe/{city}/{merek}/{design}', 'ApiController@getTipe');
});

Route::get('img/user/{file}', function($file = null)
{
    return Mytuta::readFile($file,'user');
});

// auth
Route::group(['middleware' => ['auth']], function () {

  Route::group(['namespace' => 'Api'], function() {
      Route::get('api/getmerekslot', 'ApiController@getMerekSlot');
      Route::get('api/getdesignslot/{merek}', 'ApiController@getDesignSlot');
      Route::get('api/gettipeslot/{merek}/{design}', 'ApiController@getTipeSlot');
      Route::get('api/getresponslot/{city}/{merek}', 'ApiController@getResponSlot');
      Route::post('api/gettotalharga', 'ApiController@getTotalHarga');
  });

  Route::group(['namespace' => 'Dashboard'], function() {
    Route::get('dashboard', 'DashboardController@index');
    // profile
    Route::resource('dashboard/profile', 'ProfileController');

//kawasan pengguna / user
    Route::group(['namespace' => 'Pengguna'], function() {
    Route::group(['middleware' => ['role:user']], function () {

        Route::get('dashboard/pengguna/deposit/local-bank', 'DepositLocalBank@index');
        Route::post('dashboard/pengguna/deposit/local-bank/store', 'DepositLocalBank@store');
        Route::get('dashboard/pengguna/riwayat/deposit', 'DepositLocalBank@riwayatDeposit');
        Route::get('dashboard/pengguna/deposit/invoice/{id}', 'DepositLocalBank@getInvoice');
        Route::put('/dashboard/pengguna/deposit/konfirmasi/{id}', 'DepositLocalBank@konfirmasi');
        Route::resource('dashboard/pengguna/slot/mobil-baru', 'SlotMobilBaruController');
        Route::resource('dashboard/pengguna/mobil-baru', 'PenggunaMobilBaru');
        Route::get('dashboard/pengguna/cash-book', 'CashBook@index');
        Route::resource('dashboard/pengguna/mobil-bekas', 'MobilBekasController');
        Route::resource('dashboard/pengguna/req-admin', 'RequestAdminController');
      });
    });

//kawasan Admin
Route::group(['middleware' => ['role:admin']], function () {
  //  Route::group(['middleware' => ['role:admin']], function () {
      //API User
      Route::post('api/user', 'UserController@getData');
      //users
      Route::resource('dashboard/users', 'UserController');
  //  });

    //  Route::group(['middleware' => 'admin'], function() {
          // Kota Start
      		Route::get('dashboard/kota', ['as' => 'dashboard.kota', 'uses' => 'KotaController@index']);
      		Route::post('dashboard/kota/store', ['as' => 'dashboard.kota.store', 'uses' => 'KotaController@store']);
      		Route::get('dashboard/kota/edit/{id}', ['as' => 'dashboard.kota.edit', 'uses' => 'KotaController@edit']);
      		Route::post('dashboard/kota/update/{id}', ['as' => 'dashboard.kota.update', 'uses' => 'KotaController@update']);
      		Route::post('dashboard/kota/delete/{id}', ['as' => 'dashboard.kota.delete', 'uses' => 'KotaController@destroy']);
      		// Kota End
          // merek Start
          Route::get('dashboard/merek', ['as' => 'dashboard.merek', 'uses' => 'MerekController@index']);
          Route::post('dashboard/merek/store', ['as' => 'dashboard.merek.store', 'uses' => 'MerekController@store']);
          Route::get('dashboard/merek/edit/{id}', ['as' => 'dashboard.merek.edit', 'uses' => 'MerekController@edit']);
          Route::post('dashboard/merek/update/{id}', ['as' => 'dashboard.merek.update', 'uses' => 'MerekController@update']);
          Route::post('dashboard/merek/delete/{id}', ['as' => 'dashboard.merek.delete', 'uses' => 'MerekController@destroy']);
          // Merek End
          // model Start
          Route::get('dashboard/model', ['as' => 'dshboard.model', 'uses' => 'DesignController@index']);
          Route::post('dashboard/model/store', ['as' => 'dashboard.model.store', 'uses' => 'DesignController@store']);
          Route::get('dashboard/model/edit/{id}', ['as' => 'dashboard.model.edit', 'uses' => 'DesignController@edit']);
          Route::post('dashboard/model/update/{id}', ['as' => 'dashboard.model.update', 'uses' => 'DesignController@update']);
          Route::post('dashboard/model/delete/{id}', ['as' => 'dashboard.model.delete', 'uses' => 'DesignController@destroy']);
          // model End
          // tipe Start
          Route::get('dashboard/tipe', ['as' => 'dashboard.tipe', 'uses' => 'TipeController@index']);
          Route::post('dashboard/tipe/store', ['as' => 'dashboard.tipe.store', 'uses' => 'TipeController@store']);
          Route::get('dashboard/tipe/edit/{id}', ['as' => 'dashboard.tipe.edit', 'uses' => 'TipeController@edit']);
          Route::post('dashboard/tipe/update/{id}', ['as' => 'dashboard.tipe.update', 'uses' => 'TipeController@update']);
          Route::post('dashboard/tipe/delete/{id}', ['as' => 'dashboard.tipe.delete', 'uses' => 'TipeController@destroy']);
          // tipe End
          // Bank Start
      		Route::get('dashboard/bank', ['as' => 'dashboard.bank', 'uses' => 'BankController@index']);
      		Route::post('dashboard/bank/store', ['as' => 'dashboard.bank.store', 'uses' => 'BankController@store']);
      		Route::get('dashboard/bank/edit/{id}', ['as' => 'dashboard.bank.edit', 'uses' => 'BankController@edit']);
      		Route::post('dashboard/bank/update/{id}', ['as' => 'dashboard.bank.update', 'uses' => 'BankController@update']);
      		Route::post('dashboard/bank/delete/{id}', ['as' => 'dashboard.bank.delete', 'uses' => 'BankController@destroy']);
      		// Bank End

          //admin mengisi data feature mobil baru
          Route::get('dashboard/mobil-baru/feature/{id}', 'MobilBaruController@feature');

          // interior_exterior Start
          Route::get('dashboard/mobil-baru/interior', 'MobilBaruController@interior');
          Route::get('dashboard/mobil-baru/interior/create', 'MobilBaruController@interiorCreate');
          Route::post('dashboard/mobil-baru/interior/store', 'MobilBaruController@interiorStore');
          Route::get('dashboard/mobil-baru/interior/{id}/edit', 'MobilBaruController@interiorEdit');
          Route::put('dashboard/mobil-baru/interior/update/{id}', 'MobilBaruController@interiorUpdate');
          Route::delete('/dashboard/mobil-baru/interior/delete/{id}', 'MobilBaruController@interiorDestroy');
          // interior_exterior End
          // interior_exterior text Start
          Route::post('dashboard/mobil-baru/feature/interior/store', ['as' => 'dashboard.feature.store', 'uses' => 'MobilBaruController@interiorStoreText']);
          Route::get('dashboard/mobil-baru/feature/interior/edit/{id}', ['as' => 'dashboard.feature.edit', 'uses' => 'MobilBaruController@interiorEditText']);
          Route::post('dashboard/mobil-baru/feature/interior/update/{id}', ['as' => 'dashboard.feature.update', 'uses' => 'MobilBaruController@interiorUpdateText']);
          Route::post('dashboard/mobil-baru/feature/interior/delete/{id}', ['as' => 'dashboard.feature.delete', 'uses' => 'MobilBaruController@interiorDestroyText']);
          // interior_exterior text End

          // keamanan_kelengkapan gambar Start
          Route::get('dashboard/mobil-baru/keamanan', 'MobilBaruController@keamanan');
          Route::get('dashboard/mobil-baru/keamanan/create', 'MobilBaruController@keamananCreate');
          Route::post('dashboard/mobil-baru/keamanan/store', 'MobilBaruController@keamananStore');
          Route::get('dashboard/mobil-baru/keamanan/{id}/edit', 'MobilBaruController@keamananEdit');
          Route::put('dashboard/mobil-baru/keamanan/update/{id}', 'MobilBaruController@keamananUpdate');
          Route::delete('/dashboard/mobil-baru/keamanan/delete/{id}', 'MobilBaruController@keamananDestroy');
          // keamanan_kelengkapan gambar End
          // keamanan_kelengkapan text Start
          Route::post('dashboard/mobil-baru/feature/keamanan/store', ['as' => 'dashboard.feature.store', 'uses' => 'MobilBaruController@keamananStoreText']);
          Route::get('dashboard/mobil-baru/feature/keamanan/edit/{id}', ['as' => 'dashboard.feature.edit', 'uses' => 'MobilBaruController@keamananEditText']);
          Route::post('dashboard/mobil-baru/feature/keamanan/update/{id}', ['as' => 'dashboard.feature.update', 'uses' => 'MobilBaruController@keamananUpdateText']);
          Route::post('dashboard/mobil-baru/feature/keamanan/delete/{id}', ['as' => 'dashboard.feature.delete', 'uses' => 'MobilBaruController@keamananDestroyText']);
          // keamanan_kelengkapan text End

          //admin mengisi data gallery mobil baru
          Route::get('dashboard/mobil-baru/gallery', 'MobilBaruController@gallery');
          Route::get('dashboard/mobil-baru/gallery/create', 'MobilBaruController@galleryCreate');
          Route::post('dashboard/mobil-baru/gallery/store', 'MobilBaruController@galleryStore');
          Route::get('dashboard/mobil-baru/gallery/{id}/edit', 'MobilBaruController@galleryEdit');
          Route::put('dashboard/mobil-baru/gallery/update/{id}', 'MobilBaruController@galleryUpdate');
          Route::delete('/dashboard/mobil-baru/gallery/delete/{id}', 'MobilBaruController@galleryDestroy');
          // end gallery
          //mobil baru
          Route::resource('dashboard/mobil-baru', 'MobilBaruController');
          //category Posting
          Route::get('dashboard/category', ['as' => 'dashboard.category', 'uses' => 'CategoryController@index']);
      		Route::post('dashboard/category/store', ['as' => 'dashboard.category.store', 'uses' => 'CategoryController@store']);
      		Route::get('dashboard/category/edit/{id}', ['as' => 'dashboard.category.edit', 'uses' => 'CategoryController@edit']);
      		Route::post('dashboard/category/update/{id}', ['as' => 'dashboard.category.update', 'uses' => 'CategoryController@update']);
      		Route::post('dashboard/category/delete/{id}', ['as' => 'dashboard.category.delete', 'uses' => 'CategoryController@destroy']);
          //posting
          Route::resource('dashboard/post', 'PostController');
          Route::resource('dashboard/sosmed', 'SosialMediaController');
          Route::resource('dashboard/harga-slot', 'HargaSlotController');
          Route::resource('dashboard/rekening-tujuan', 'RekeningTujuan');
          Route::get('dashboard/deposit-pengguna', 'DepositPengguna@index');
          Route::put('dashboard/deposit-pengguna/invoice/proses/{id}', 'DepositPengguna@prosesBayar');

          // slot mobil baru
          Route::resource('dashboard/slot/mobil-baru', 'SlotMobilBaruController');
          Route::resource('dashboard/slot/mobil-bekas', 'SlotMobilBekasController');

          // request to admin
          Route::resource('dashboard/myrequest', 'RequestAdminController');
    //});
      });
  });
});
