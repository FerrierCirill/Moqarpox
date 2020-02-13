<?php

// ================== //
//      Classic       //
// ================== //

Route::get('/', 'HomeController@index')->name('main');
Route::get('/map', 'HomeController@test')->name('sylvian_map');
Route::get('/redir', 'HomeController@testDir');

Route::get('/legalMentions', 'HomeController@LM')->name('legal_mentions');
Route::get('/termsConditionsUse', 'HomeController@TCU')->name('terms_conditions_use');
Route::get('/termsConditionsSale', 'HomeController@TCS')->name('terms_conditions_sale');


// ================== //
//     Activity       //
// ================== //

Route::get('/activity/add', 'ActivitiesController@getAddActivity')->name('activity_add_get');              // MIDDLEWARE
Route::post('/activity/add', 'ActivitiesController@postAddActivity')->name('activity_add_post');           // MIDDLEWARE

Route::get('/activity/{activity_id}', 'ActivitiesController@getActivity')->name('activity_details');


// ================== //
//      Company       //
// ================== //

Route::get('/company/add', 'CompaniesController@getAddCompany')->name('company_add_get');                  // MIDDLEWARE
Route::post('/company/add', 'CompaniesController@postAddCompany')->name('company_add_post');               // MIDDLEWARE

Route::get('/company/{company_id}', 'CompaniesController@getCompany')->name('company_details');

Route::get('/company/{company_id}/edit', 'CompaniesController@getEditCompany')->name('company_edit');      // MIDDLEWARE
Route::post('/company/{company_id}/edit', 'CompaniesController@PostEditCompany')->name('company_edit');    // MIDDLEWARE


// ================== //
//        User        //
// ================== //

Route::get('/user', 'UsersController@getClient')->name('user_details');                                    // MIDDLEWARE
Route::get('/user/companies', 'UsersController@getCompanies')->name('user_companies');                     // MIDDLEWARE
Route::get('/user/historical', 'UsersController@historical')->name('user_historical');                     // MIDDLEWARE


// ================== //
//    ShoppingCart    //
// ================== //

Route::get('/shoppingCart', 'HomeController@shoppingCart')->name('shopping_cart');                         // MIDDLEWARE
Route::get('/payment', 'HomeController@payment')->name('payment');                                         // MIDDLEWARE


// ================== //
//        Admin       //
// ================== //

Route::get('/admin','AdminController@moderation')->name('admin');                                               // MIDDLEWARE


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
