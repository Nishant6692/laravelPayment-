<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductCSVController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



// Admin 
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        // login route
        Route::get('login','AuthenticatedSessionController@create')->name('login');
        Route::post('login','AuthenticatedSessionController@store')->name('adminlogin');
    });
    Route::middleware('admin')->group(function(){
        Route::get('dashboard','HomeController@index')->name('dashboard');

        Route::get('admin-test','HomeController@adminTest')->name('admintest');
        Route::get('editor-test','HomeController@editorTest')->name('editortest');

        Route::resource('posts','PostController');

    });
    Route::post('logout','Auth\AuthenticatedSessionController@destroy')->name('logout');
});

Route::get('/fileupload',[ProductCSVController::class,'index'])->name('csv-index');
Route::post('/fileupload-store',[ProductCSVController::class,'store'])->name('csv-upload-store');
Route::get('/check',[Controller::class,'index']);
Route::get('success',function (){
return 'success payment';

})->name('success-payment');

Route::get('cancel',function (){
    return 'Cancel payment';
    
    })->name('cancel-payment');
    







