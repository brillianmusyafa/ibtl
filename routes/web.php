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
Route::auth();
Route::get('/logout','UsersController@logout');
Route::get('/','HomeController@index');
// Route::get('/daftar/{kategori}','HomeController@daftar');
// Route::get('/daftar/{id}/pertanyaan','HomeController@pertanyaan');
// Route::get('/daftar_pertanyaan','PertanyaanController@list_pertanyaan');
// Route::get('/perpustakaan_keuangan_daerah','HomeController@perpustakaan_keuangan_daerah');
// Route::get('/apbd','HomeController@apbd');
// Route::get('/admin',function(){
// 	return view('layouts.adminlte');
// });


// Route::group(['prefix'=>'admin'],function(){
// 	Route::get('dashboard','HomeController@dashboard');
// 	Route::resource('kategory', 'KategoryController');
// 	Route::resource('pertanyaan', 'PertanyaanController');

// 	Route::resource('peraturan_daerah', 'Peraturan_daerahController');
// 	Route::resource('berita', 'BeritaController');
// 	Route::resource('apbd', 'ApbdController');
// });

// Route::group(['prefix'=>'docs'],function(){
// 	Route::get('icons',function(){
// 		return view('pages.icons');
// 	});
// });

// Route::resource('users', 'UsersController');
// Route::resource('admin/role', 'Admin\\RoleController');
// // Auth::routes();
// Route::get('/home', 'HomeController@index');
// Route::resource('buku_tamu', 'Buku_tamuController');
// Route::resource('skpd', 'SkpdController');
// Route::resource('bidang', 'BidangController');
Route::get('menu_json','MenuController@jsonMenu');
Route::resource('page', 'PageController');

// halaman
Route::get('p/{slug}','PageController@page_public');

// categoy
Route::get('category/{categoy}','Formulir_btlController@halaman_umum');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
	// dashboard
	Route::get('/','AdminController@dashboard');
	// page
	Route::resource('page','PageController');
	// menu
	Route::resource('menu', 'MenuController');
	// formulir
	Route::resource('formulir_btl', 'Formulir_btlController');
	Route::post('datatable/formulir_btl/hapus/{id}','Formulir_btlController@datatable_destroy');
	// Route::group(['prefix'=>'datatable'],function(){
	// 	Route::get('formulir_btl','Formulir_btl@getBasic');
	// });
	// kategori
	Route::resource('category', 'CategoryController');
	// user
	Route::resource('users', 'UsersController');
	// role
	// Route::resource('role', 'Admin\\RoleController');

	Route::group(['prefix'=>'report'],function(){
		Route::get('/','ReportController@index');
		Route::get('desa','ReportController@desa');
		Route::get('desa/{kecamatan_id}','ReportController@desa_detail');
	});
});


Route::group(['prefix'=>'api','middleware'=>'auth'],function(){
	Route::get('get-desa/{kecamatan_id}','ApiController@getDesa');
	Route::get('sub-category/{id}','ApiController@getSubCategory');
});


Route::group(['prefix'=>'engine'],function(){
	Route::get('/table','EngineController@index');
	Route::get('/dump',function(){
		Artisan::call('mysql-dump');
	});
});


Route::group(['prefix'=>'api/mobile'],function(){
	Route::get('menu/{parent?}','ApiController@getMenu');
	Route::get('page/{id}','ApiController@getPage');
	Route::post('data/{cat}','ApiController@getData');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix'=>'datatables'],function(){
	Route::get('formulir','Formulir_btlController@anyData')->name('datatables.formulir');
	Route::get('formulir_front/{category?}','Formulir_btlController@anyDataFrontPage')->name('datatables.formulir_front');
});

// import data
Route::post('import','Formulir_btlController@importExcel');