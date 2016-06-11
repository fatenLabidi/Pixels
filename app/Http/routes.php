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
    
    // Affiche la page "home"
    Route::get('/', 'HomeCtrl@index');
    
    // Connexion
    Route::get('login', 'AuthController@index');
    
    // Inscription utilisateur
    Route::get('inscription', 'InscriptionController@index');
    
    // Création quiz
    Route::get('nouveauQuiz', 'QuizCtrl@create');
    Route::resource('creerQuiz', 'QuizCtrl@store');
    
    Route::get('nouvelleQuestion', 'QuestionQuizCtrl@create');
    Route::resource('creerQuestionQuiz', 'QuestionQuizCtrl@store');
    //Route::get('quiz/creer', 'QuizCtrl@')
    
    
    
    // Afficher quiz
    //Route::get('nouvelleQuestionQuiz/{id}', 'QuizCtrl@show');
    //Route::get('user/{id}', 'UserController@showProfile');
    
    // Création question quiz
    Route::get('quiz/creerQuestionQuiz/{id}', 'QuestionQuizCtrl@create');
    //Route::resource('creerQuiz', 'QuizCtrl@store');
    
    //Route::get('creerQuiz', 'QuizCtrl@store');

    // Juste un test pour envoyer un formulaire depuis login
    Route::resource('connexion', 'AuthController@connexion');
    
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