<?php
use Illuminate\Http\RedirectResponse;

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



Route::group(['middleware' => ['web']], function () {
    
    Route::get('/', 'HomeCtrl@index');
    
    Route::get('login', 'Auth\AuthController@index');    
    
    //

});



/*
Route::get('front/home', function() {
  return File::get(public_path() . '/front/index.html');
});
 * 
 */

/*

Route::get('front/models', function() {
  return File::get(public_path() . '/front/modelsfc.html');
});
Route::get('front/events', function() {
  return File::get(public_path() . '/front/events.html');
});
Route::get('front/elections', function() {
  return File::get(public_path() . '/front/elections.html');
});
Route::get('front/partners', function() {
  return File::get(public_path() . '/front/partners.html');
});
Route::get('front/about', function() {
  return File::get(public_path() . '/front/aboutUs.html');
});
Route::get('front/signup', function() {
  return File::get(public_path() . '/front/signUp.html');
});

Route::get('front/wardrobe', function() {
  return File::get(public_path() . '/front/wardrobe.html');
});
*/

Route::group(['prefix' => '/api'], function() {
    
});