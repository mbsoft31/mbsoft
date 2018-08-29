<?php
use Illuminate\Support\Facades\Storage;
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
    return view('welcome');
});

Route::post('/upload', function(){
	request()->validate([
            'fileToUpload' => 'required|file|max:1024',
        ]);
 
    $fileName = "fileName".time().'.'.request()->fileToUpload->getClientOriginalExtension();

    $path = request()->fileToUpload->storeAs('public/logos',$fileName);

    return [
    	'name' => $fileName,
    	'type' => request()->fileToUpload->getClientOriginalExtension(),
    	'size' => Storage::size($path),
    	'url'  => Storage::url($path)
    ];
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
