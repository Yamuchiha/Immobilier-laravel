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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/', 'ClientController@home');
Route::get('/', 'ClientController@acceuil');
Route::get('/Detail/{image}/{id}', 'ClientController@detail');
Route::get('/achat', 'ClientController@shop');
Route::get('/connexion', 'ClientController@login');
Route::get('/payer', 'ClientController@payer');
Route::get('/panier', 'ClientController@panier');
Route::get('/selection_cat/{nom}', 'ClientController@selection_cat');
Route::get('/ajouter_au_panier/{id}', 'ClientController@ajouterAuPanier');
Route::get('/acheter', 'ClientController@achat');
Route::get('/selection_Categorie/{categorie_nom}', 'ClientController@selection_Categorie');
Route::get('/retirer_maison/{id}', 'ClientController@retirer_maison');
Route::post('/validation_payement', 'ClientController@validation_payement');

Route::get('/admin', 'AdminController@admin');
Route::get('/achats', 'AdminController@achat');
// Route::get('/validation_payement', 'AdminController@validation_payement');

Route::get('/ajoutCategorie', 'CategoryController@ajoutCategorie');
Route::post('/sauverCategorie', 'CategoryController@sauvercategorie');
Route::get('/categories', 'CategoryController@categories');
Route::get('/editer_categorie/{id}', 'CategoryController@editer_categorie');
Route::post('/modifiercategorie', 'CategoryController@modifiercategorie');
Route::get('/supprimercategorie/{id}', 'CategoryController@supprimercategorie');


Route::get('/ajoutMaison', 'MaisonController@ajouterMaison');
Route::post('/sauverMaison', 'MaisonController@sauvermaison');
Route::get('/maisons', 'MaisonController@maisons');
Route::get('/editer_maison/{id}', 'MaisonController@editer_maison');
Route::post('/modifiermaison', 'MaisonController@modifiermaison');
Route::get('/supprimermaison/{id}', 'MaisonController@supprimermaison');
Route::get('/desactive_maison/{id}', 'MaisonController@desactive_maison');
Route::get('/active_maison/{id}', 'MaisonController@active_maison');

Route::get('/ajoutSlider', 'SliderController@ajouterSlider');
Route::post('/sauverSlider', 'SliderController@sauverslider');
Route::get('/sliders', 'SliderController@sliders');
Route::get('/editer_slider/{id}', 'SliderController@editer_slider');
Route::post('/modifierslider', 'SliderController@modifierslider');
Route::get('/supprimerslider/{id}', 'SliderController@supprimerslider');
Route::get('/desactive_slider/{id}', 'SliderController@desactive_slider');
Route::get('active_slider/{id}', 'SliderController@active_slider');


Route::get('/ajoutTrano', 'TranoController@ajoutertrano');
Route::post('/sauverTrano', 'TranoController@sauverTrano');
Route::get('/tranos', 'TranoController@trano');
Route::get('/ajouterIllustration/{image}', 'TranoController@ajouterIllustration');
Route::post('/sauverillustration', 'TranoController@sauverillustration');
Route::get('/voirIllustration/{image}', 'TranoController@voirIllustration');
Route::get('/editer_trano/{id}', 'TranoController@editer_trano');
Route::post('/modifiertrano', 'TranoController@modifiertrano');
Route::get('/supprimertrano/{id}', 'TranoController@supprimertrano');
Route::get('/desactive_trano/{id}', 'TranoController@desactive_trano');
Route::get('/active_trano/{id}', 'TranoController@active_trano');
