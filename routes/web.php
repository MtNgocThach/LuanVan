<?php

use App\catalogue_room;

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

// Client
Route::group(['prefix'=>'client'],function(){
    
    Route::get('contact','contactCtrl@getInfo');

    Route::get('blog','blogCtrl@getInfo');
    Route::post('blog','blogCtrl@postInfo');

    Route::get('blog_title/{id}','blogTitleCtrl@getInfo');

    Route::get('blog_detail/{id}','blogDetailCtrl@getInfo');

    Route::get('trangchu','trangchuCtrl@getInfo');
    Route::post('trangchu','trangchuCtrl@postInfo');
    
    Route::post('email','mailCtrl@sendEmail');
});

Route::get('logout','userCtrl@getLogout');

Route::get('login','userCtrl@getLoginMotelers');
Route::post('login','userCtrl@postLoginMotelers');


Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

    Route::group(['prefix'=>'account'],function(){

        Route::get('list','adAccCtrl@getList');

        Route::get('del/{id}','adAccCtrl@getDel');
        
        Route::get('edit/{id}','adAccCtrl@getEdit');
        Route::post('edit/{id}','adAccCtrl@postEdit');

        Route::get('add','adAccCtrl@getAdd');
        Route::post('add','adAccCtrl@postAdd');
    }); 
});

//moteler
Route::group(['prefix'=>'moteler','middleware'=>'motelerLogin'],function(){
    //profiles
    Route::group(['prefix'=>'profile'],function(){
        
        Route::get('info','profileCtrl@getInfo');
        
        Route::get('edit/{id}','profileCtrl@getEdit');
        Route::post('edit/{id}','profileCtrl@postEdit');
        
    });
    
    // catalogue_room
    Route::group(['prefix'=>'catalogue_room'],function(){
        
        Route::get('list','catalogue_roomCtrl@getList');

        Route::get('del/{id}','catalogue_roomCtrl@getDel');
        
        Route::get('edit/{id}','catalogue_roomCtrl@getEdit');
        Route::post('edit/{id}','catalogue_roomCtrl@postEdit');

        Route::get('add','catalogue_roomCtrl@getAdd');
        Route::post('add','catalogue_roomCtrl@postAdd');
        
    });
    // motels
    Route::group(['prefix'=>'motels'],function(){
        
        Route::get('list','motelsCtrl@getList');
        
        Route::get('del/{id}','motelsCtrl@getDel');
        
        Route::get('edit/{id}','motelsCtrl@getEdit');
        Route::post('edit/{id}','motelsCtrl@postEdit');

        Route::get('add','motelsCtrl@getAdd');
        Route::post('add','motelsCtrl@postAdd');
        
    });

    // rooms
    Route::group(['prefix'=>'rooms'],function(){
        
        Route::get('list','roomsCtrl@getList');
        
        Route::get('del/{id}','roomsCtrl@getDel');
        
        Route::get('edit/{id}','roomsCtrl@getEdit');
        Route::post('edit/{id}','roomsCtrl@postEdit');

        Route::get('add','roomsCtrl@getAdd');
        Route::post('add','roomsCtrl@postAdd');
        
    });
    // services
    Route::group(['prefix'=>'services'],function(){
        
        Route::get('list','servicesCtrl@getList');
        
        Route::get('del/{id}','servicesCtrl@getDel');
        
        Route::get('edit/{id}','servicesCtrl@getEdit');
        Route::post('edit/{id}','servicesCtrl@postEdit');

        Route::get('add','servicesCtrl@getAdd');
        Route::post('add','servicesCtrl@postAdd');
        
    });
});
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

