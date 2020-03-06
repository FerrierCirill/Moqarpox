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

Route::get('/activity/add/{company_id}', 'ActivitiesController@getAddActivity')->name('activity_add_get')->middleware('AuthIsProviderAndItsHisCompany');
Route::post('/activity/add/{company_id}', 'ActivitiesController@postAddActivity')->name('activity_add_post')->middleware('AuthIsProviderAndItsHisCompany');

Route::get('/activity/{activity_id}', 'ActivitiesController@getActivity')->name('activity_details');

Route::get('/activity/confirm/{activity_id}', 'ActivitiesController@confirmActivity')->name('confirm_activity')->middleware('AuthIsAdmin');
Route::get('/activity/refuse/{activity_id}', 'ActivitiesController@refuseActivity')->name('refuse_activity')->middleware('AuthIsAdmin');

Route::get('/activity/{activity_id}/{state}', 'ActivitiesController@changeState')->name('change_state_activity')->middleware('AuthIsProviderAndItsHisActivity');


// ================== //
//      Company       //
// ================== //

Route::get('/company/add', 'CompaniesController@getAddCompany')->name('company_add_get')->middleware('auth');
Route::post('/company/add', 'CompaniesController@postAddCompany')->name('company_add_post')->middleware('auth');

Route::get('/company/{company_id}', 'CompaniesController@getCompany')->name('company_details');

Route::get('/company/{company_id}/edit', 'CompaniesController@getEditCompany')->name('company_edit')->middleware('AuthIsProviderAndItsHisCompany');
Route::post('/company/{company_id}/edit', 'CompaniesController@postEditCompany')->name('company_edit')->middleware('AuthIsProviderAndItsHisCompany');

Route::get('/company/moneyBack', 'CompaniesController@getMoneyBack')->name('company_moneyback_get')->middleware('auth');
Route::post('/company/moneyBack', 'CompaniesController@postMoneyBack')->name('company_moneyback_post')->middleware('auth');

Route::get('/company/confirm/{company_id}', 'CompaniesController@confirmCompany')->name('confirm_company')->middleware('AuthIsAdmin');
Route::get('/company/refuse/{company_id}', 'CompaniesController@refuseCompany')->name('refuse_company')->middleware('AuthIsAdmin');

Route::get('/company/disable/{company_id}', 'CompaniesController@disableCompany')->name('disable_company')->middleware('AuthIsProviderAndItsHisCompany');
Route::get('/company/enable/{company_id}', 'CompaniesController@confirmCompany')->name('enable_company')->middleware('AuthIsProviderAndItsHisCompany');

// ================== //
//        User        //
// ================== //

Route::get('/user', 'UsersController@getClient')->name('user_details')->middleware('auth');
Route::get('/user/historical', 'UsersController@historical')->name('user_historical')->middleware('auth');
Route::post('/user/edit', 'UsersController@postUserEdit')->name('user_edit')->middleware('auth');

Route::get('/comment/add', 'HomeController@getAddComment')->name('get_add_comment');     //MIDDLEWARE ?
Route::post('/comment/add', 'HomeController@postAddComment')->name('post_add_comment');  //MIDDLEWARE ?

Route::get('/repayment', 'HomeController@getRepayment')->name('get_repayment');          //MIDDLEWARE ?
Route::post('/repayment', 'HomeController@postRepayment')->name('post_repayment');       //MIDDLEWARE ?


// ================== //
//    ShoppingCart    //
// ================== //

Route::get('/shoppingCart', 'ShoppingCartController@shoppingCart')->name('shopping_cart');
Route::post('/shoppingCart/addItem', 'ShoppingCartController@shoppingCartAdd')->name('shopping_cart_add');
Route::get('/payment', 'ShoppingCartController@payment')->name('payment')->middleware('auth');

Route::get('/testSession', 'ShoppingCartController@testSession');


// ================== //
//        Admin       //
// ================== //

Route::get('/admin','AdminController@moderation')->name('admin')->middleware('AuthIsAdmin');

Route::post('/admin/add', 'AdminController@addAdmin')->name('add_admin')->middleware('AuthIsAdmin');
Route::post('/admin/delete', 'AdminController@deleteAdmin')->name('delete_admin')->middleware('AuthIsAdmin');

// ================== //
//     Route AJAX     //
// ================== //

Route::get('/api/mapUpdate/{category_id}/{subCategory_id}/{what}/{where}', 'ApiController@mapUpdate')->name('api_map_update');
Route::get('/api/activities/{company_id}', 'ApiController@getActivitiesOfCompany')->name('api_activities_of_company');

Route::get('/api/datalist/{value}', 'ApiController@datalist')->name('api_datalist');
Route::get('/api/main_search/{type}/{value}', 'ApiController@mainSearch')->name('api_main_search');
Route::get('/api/budget/{value}/{budget}', 'ApiController@budget')->name('api_budget');

Route::get('/api/marker/{address}', 'ApiController@returnLatlng')->name('api_lat_lng');


// ================== //
//     Route Google   //
// ================== //

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

// ================== //
//     Route email    //
// ================== //

Route::get('send-mail','UsersController@sendEmailToUser');

///////////////////////////////////////

Auth::routes();

/*
 * TODO
 * Paiement / Remboursement(optionel)
 * Rembourser un bon-cadeau
 * Tout le systeme d'authentification (floren est dessus)
 * Modérateur / Admin
 * (OK) Déposer un avis
 * Gestion commentaire
 * Gestion Activités
 * Gestion Structures
 * Gestions ( admin panel)
 */
