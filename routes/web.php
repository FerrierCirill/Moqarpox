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

Route::get('/', 'HomeController@test'); // Accueil
Route::get('/random', 'HomeController@index');

Route::get('/activities', 'ActivitiesController@getActivities')->name('activity_get_all');           // liste toutes les activitées
Route::get('/activity/add', 'ActivitiesController@getAddActivity')->name('activity_add_get');        // Add Act
Route::post('/activity/add', 'ActivitiesController@postAddActivity')->name('activity_add_post');     // Add Act
Route::get('/activity/{activity_id}', 'ActivitiesController@getActivity')->name('activity_details'); // Détail Act

Route::get('/compagnies', 'CompagniesController@getCompagnies')->name('compagny_get_all');              // Liste les compagny
Route::get('/compagny/add', 'CompagniesController@getAddCompagny')->name('compagny_add_get');           // Add comp
Route::post('/compagny/add', 'CompagniesController@postAddCompagny')->name('compagny_add_post');        // Add comp
Route::get('/compagny/{compagny_id}', 'CompagniesController@getCompagny')->name('compagny_details');    // Mon entreprise/struct
Route::get('/compagny/{compagny_id}/edit', 'CompagniesController@editCompagny')->name('compagny_edit'); // Edit comp

Route::get('/customer/{user_id}', 'UsersController@getCustomer')->name('customer_details');                   // Profil
Route::get('/customer/{user_id}/historical', 'UsersController@historical')->name('customer_historical');      // Historique
Route::get('/customer/{user_id}/shoppingCart', 'HomeController@shoppingCart')->name('customer_shopping_cart');// Panier
Route::get('/provider/{user_id}', 'UsersController@getProvider')->name('provider_details');                   // Mes entreprises/struct

Route::get('/legalMentions', 'HomeController@LM')->name('legal_mentions');                 //Mentions légal
Route::get('/termsConditionsUse', 'HomeController@TCU')->name('terms_conditions_use');     // CGU
Route::get('/termsConditionsSale', 'HomeController@TCS')->name('terms_conditions_sale');   // CGV

Route::get('/panier', 'PanierVenteController@panier')->name('panier');


Route::get('/design', 'HomeController@index'); // a edit quand ca sera bon pour la route '/'

Route::get('/admin','AdminController@index'); // a edit
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
