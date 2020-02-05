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

Route::get('/', 'HomeController@test');

Route::get('/activities', 'ActivitiesController@getActivities')->name('activity_get_all');
Route::get('/activity/add', 'ActivitiesController@getAddActivity')->name('activity_add_get');
Route::post('/activity/add', 'ActivitiesController@postAddActivity')->name('activity_add_post');
Route::get('/activity/{activity_id}', 'ActivitiesController@getActivity')->name('activity_details');

Route::get('/compagnies', 'CompagniesController@getCompagnies')->name('compagny_get_all');
Route::get('/compagny/add', 'CompagniesController@getAddCompagny')->name('compagny_add_get');
Route::post('/compagny/add', 'CompagniesController@postAddCompagny')->name('compagny_add_post');
Route::get('/compagny/{compagny_id}', 'CompagniesController@getCompagny')->name('compagny_details');
Route::get('/compagny/{compagny_id}/edit', 'CompagniesController@editCompagny')->name('compagny_edit');

Route::get('/customer/{user_id}', 'UsersController@getCustomer')->name('customer_details');
Route::get('/customer/{user_id}/historical', 'UsersController@historical')->name('customer_historical');
Route::get('/customer/{user_id}/shoppingCart', 'HomeController@shoppingCart')->name('customer_shopping_cart');
Route::get('/provider/{user_id}', 'UsersController@getProvider')->name('provider_details');

Route::get('/legalMentions', 'HomeController@LM')->name('legal_mentions');
Route::get('/termsConditionsUse', 'HomeController@TCU')->name('terms_conditions_use');
Route::get('/termsConditionsSale', 'HomeController@TCS')->name('terms_conditions_sale');

Route::get('/design', 'HomeController@design');

/*
 * TODO
 * Paiement / Remboursement
 * Rembourser un bon-cadeau
 * Tout le systeme d'authentification (floren est dessus)
 * Modérateur / Admin
 */
