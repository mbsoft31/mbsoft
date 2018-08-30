<?php
use Illuminate\Support\Facades\Storage;
use App\Media;
use App\Http\Resources\Media as Medias;
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
Route::get('/test', function () {
    return view('test');
});

Route::post('/upload', function(){
	$request->validate([
        'file' => 'required|file|max:1024',
    ]);
 
    $fileName = "fileName".time().'.'.$request->fileToUpload->getClientOriginalExtension();

    $path = $request->fileToUpload->storeAs('public/hello',$fileName);

    $media = Media::create([
        'name' => $fileName,
        'type' => $request->fileToUpload->getClientOriginalExtension(),
        'size' => Storage::size($path),
        'url'  => Storage::url($path),
        'user_id' => $request->user()->id
    ]);

    dd([
            'name' => $fileName,
            'type' => $request->fileToUpload->getClientOriginalExtension(),
            'size' => Storage::size($path),
            'url'  => Storage::url($path),
            'user_id' => $request->user()->id
        ]);

    return new Medias($media);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/dashboard', function ()
{
    return view('dashboard.index');
});