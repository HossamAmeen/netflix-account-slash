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


Route::get('/', function () {
    return view('welcome');
    
})->name('explore');


Route::get('/tutorials', function () {
    return view('tutorial');
})->name('tutorial');


Route::get('/support', function () {
    return view('support');
})->name('support');
Route::get('/pricing', function () {
    return view('pricing');
    
})->name('pricing');


Route::get('/netflix/{id}', 'AccountController@netflixIndex');
Route::get('/replacement/{id}', 'AccountController@replacement');

Route::get('/404', function () {
    return view('error');
})->name('404');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

//admin section
Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    
    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('/download/{category}/{used}', ['as' => 'netflix.download', 'uses' => 'AccountController@download']);
    Route::get('/downloadReplacement/{category}/{used}', ['as' => 'netflix.downloadReplacement', 'uses' => 'AccountController@downloadReplacement']);

    Route::get('/account/{model}/{accountCategory}', ['as' => 'account.index', 'uses' => 'AccountController@getAll']);


    Route::get('/create/{model}/{accountCategory}', ['as' => 'account.create', 'uses' => 'AccountController@create']);
    Route::get('/edit/{id}', ['as' => 'account.edit', 'uses' => 'AccountController@edit']);
    Route::post('/store/{model}/{accountCategory}', ['as' => 'account.store', 'uses' => 'AccountController@storeAccounts']);
    Route::put('/update/{id}', ['as' => 'account.update', 'uses' => 'AccountController@updateAccounts']);

    Route::resource('netflix', 'NetflixAccountController', ['except' => ['index', 'show', 'store']]);

    Route::resource('user', 'UserController', ['except' => ['show']]);
	//Route::resource('netflix', 'NetflixAccountController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    

    //new
   
    Route::get('account/search', ['as' => 'a.search', 'uses' => 'AccountController@search']);
    Route::post('delete/replacementaccount', ['as' => 'ra.delete', 'uses' => 'ReplacementAccountController@deleteReplacementAccounts']);
    Route::post('account/enable', ['as' => 'a.enable', 'uses' => 'AccountController@enable']);
    Route::post('account/disable', ['as' => 'a.disable', 'uses' => 'AccountController@disable']);
    
    
});

