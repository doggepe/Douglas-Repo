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

//Load all ad data to homepage
Route::get('/', 'DefaultController@load_ads_home');

Route::get('/Sok', 'DefaultController@load_search_page');
Route::post('/Sok', 'AdsController@search_ads');

//Return view and data to create ad
Route::get('/Skapa-annons', 'DefaultController@index');

//Store ad
Route::post('/Skapa-annons/Granska', 'AdsController@store');

//Delete previous post and going back to create ad view
Route::post('/Skapa-annons', 'AdsController@edit_preview');

//Showing view after ad is created
Route::post('Skapa-annons/Annons-uppladdad', 'DefaultController@show_ad_uploaded');

//Show single ad
Route::get('/jobb/{id}/{title}', 'AdsController@show');

//Get cities for typeahead
Route::get('/data/citie', 'DefaultController@get_cities');
Route::get('/data/cities/{query}', 'DefaultController@get_cities');

//Get categories
Route::get('/data/categories', 'DefaultController@get_categories');
Route::get('/data/categories/{query}', 'DefaultController@get_categories');

