<?php

use App\Events\QRScanned;

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

Route::get('/', function () {
	$qr = QrCode::size(200)->generate(env('APP_URL').'something?ip='.Request::ip());
    return view('home', compact('qr'));
});

Route::get('/something', function (Request $request) {
	if(Request::all()['ip'] == Request::ip())
	{
		event(new QRScanned());
	}
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
