<?php
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

Route::group(['domain' => 'admin.my-survey.com', 'middleware' => 'checkAuth'], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

    Route::group(['prefix' => 'subject'], function () {
        Route::get('/list', ['as' => 'subject.list', 'uses' => 'SubjectController@index']);
        Route::get('/add', ['as' => 'subject.add', 'uses' => 'SubjectController@add']);
        Route::post('/importExcel', ['as' => 'subject.importExcel', 'uses' => 'SubjectController@importExcel']);
        Route::get('/{id}/detail', ['as' => 'subject.detail', 'uses' => 'SubjectController@detail']);
        Route::post('/{id}/addSurvey', ['as' => 'subject.addSurvey', 'uses' => 'SubjectController@addSurvey']);
    });

    Route::group(['prefix' => 'survey'], function () {
        Route::get('/list', ['as' => 'survey.list', 'uses' => 'SurveyController@index']);
        Route::get('/add', ['as' => 'survey.add', 'uses' => 'SurveyController@add']);
        Route::post('/importFile', ['as' => 'survey.import', 'uses' => 'SurveyController@importFile']);
        Route::post('/create', ['as' => 'survey.create', 'uses' => 'SurveyController@create']);
        Route::get('/{id}/preview', ['as' => 'survey.preview', 'uses' => 'SurveyController@preview']);
        Route::post('/{id}/doSurvey', ['as' => 'survey.doSurvey', 'uses' => 'SurveyController@doSurvey']);
        Route::get('/{id}', ['as' => 'survey.detail', 'uses' => 'SurveyController@detail']);
    });
});

Route::get('/login', ['as' => 'user.getLogin', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('/login', ['as' => 'user.postLogin', 'uses' => 'Auth\LoginController@postLogin']);
Route::get('/logout', ['as' => 'user.logout', 'uses' => 'Auth\LoginController@logout']);