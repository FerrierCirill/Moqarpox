<?php

// ================== //
//      Classic       //
// ================== //

Route::get('/', 'HomeController@index')->name('main');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/map', 'HomeController@test')->name('sylvian_map');
Route::get('/map-v2', 'HomeController@map')->name('sylvian_map-v2');
Route::get('/redir', 'HomeController@testDir');

Route::get('/legalMentions', 'HomeController@LM')->name('legal_mentions');
Route::get('/termsConditionsUse', 'HomeController@TCU')->name('terms_conditions_use');
Route::get('/termsConditionsSale', 'HomeController@TCS')->name('terms_conditions_sale');


// ================== //
//     Activity       //
// ================== //

Route::get('/activity/add', 'ActivitiesController@getAddActivity')->name('activity_add_get')->middleware('AuthIsProvider');
Route::post('/activity/add', 'ActivitiesController@postAddActivity')->name('activity_add_post')->middleware('AuthIsProvider');

Route::get('/activity/{activity_id}', 'ActivitiesController@getActivity')->name('activity_details');


// ================== //
//      Company       //
// ================== //

Route::get('/company/add', 'CompaniesController@getAddCompany')->name('company_add_get')->middleware('auth');
Route::post('/company/add', 'CompaniesController@postAddCompany')->name('company_add_post')->middleware('auth');

Route::get('/company/{company_id}', 'CompaniesController@getCompany')->name('company_details');

Route::get('/company/{company_id}/edit', 'CompaniesController@getEditCompany')->name('company_edit')->middleware('AuthIsProviderAndItsHisCompany');
Route::post('/company/{company_id}/edit', 'CompaniesController@PostEditCompany')->name('company_edit')->middleware('AuthIsProviderAndItsHisCompany');

Route::get('/company/moneyBack', 'CompaniesController@getMoneyBack')->name('company_moneyback_get')->middleware('auth');
Route::post('/company/moneyBack', 'CompaniesController@postMoneyBack')->name('company_moneyback_post')->middleware('auth');


// ================== //
//        User        //
// ================== //

Route::get('/user', 'UsersController@getClient')->name('user_details')->middleware('auth');
Route::get('/user/historical', 'UsersController@historical')->name('user_historical')->middleware('auth');


// ================== //
//    ShoppingCart    //
// ================== //

Route::get('/shoppingCart', 'HomeController@shoppingCart')->name('shopping_cart');                         // MIDDLEWARE : yolo
Route::get('/payment', 'HomeController@payment')->name('payment')->middleware('auth');


// ================== //
//        Admin       //
// ================== //

Route::get('/admin','AdminController@moderation')->name('admin')->middleware('AuthIsAdmin');


// ================== //
//     Route AJAX     //
// ================== //

Route::get('/api/mapUpdate/{category_id}/{subCategory_id}/{what}/{where}', 'ApiController@mapUpdate')->name('api_map_update');
Route::get('/api/activities/{company_id}', 'ApiController@getActivitiesOfCompany')->name('api_activities_of_company');

Route::get('/api/datalist/{value}', 'ApiController@datalist')->name('api_datalist');
Route::get('/api/main_search/{type}/{value}', 'ApiController@mainSearch')->name('api_main_search');
Route::get('/api/budget/{value}/{budget}', 'ApiController@budget')->name('api_budget');


///////////////////////////////////////


Auth::routes();

/*
 * TODO
 * Paiement / Remboursement(optionel)
 * Rembourser un bon-cadeau
 * Tout le systeme d'authentification (floren est dessus)
 * Modérateur / Admin
 * Déposer un avis
 * Gestion commentaire
 * Gestion Activités
 * Gestion Structures
 * Gestions ( admin panel)
 */
