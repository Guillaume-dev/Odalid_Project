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


//Auth::routes();
// => contenu du groupe ci-dessus
   //Route::group(['middleware' => ['web']], function() {

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('/login', 'LogPseudoController@authentificate');
Route::post('login', 'Auth\LoginController@authenticate');
Route::get('logout', function(){return back();});
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('utilisateurs/create', 'Auth\RegisterController@showRegistrationForm')->middleware('authControl')->name('register');
Route::post('utilisateurs/create', 'Auth\RegisterController@register');

// Password Reset Routes...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// routes pour le login + mdp oublié
Route::post('/', 'Auth\LoginController@authenticate');

Route::get('password/reset', 'Auth\ForgotPasswordController@showForm')->name('forgot.pass');
Route::post('password/reset', 'Auth\ForgotPasswordController@sendPasswordResetToken')->name('reset.pass');
Route::get('reset/{token?}', 'Auth\ForgotPasswordController@showPasswordResetForm');
Route::post('reset/{token?}', 'Auth\ForgotPasswordController@resetPassword')->name('request.pass');

Route::get('/', 'HomeController@index')->name('Accueil');

//redirect page reinitialisation mdp non trouvée
Route::get('/home', 'HomeController@index');


// Test de routes sécurisées avec le controller HomeController
// (Donc non accessibles si non connecté)

Route::get('/utilisateurs', 'HomeController@utilisateurs')->name('Utilisateurs');
Route::get('/utilisateurs/edit/{n?}', 'EditController@utilisateurs')->where('n', '[0-9]+')->middleware('authControl')->name('UtilisateursEdit');
Route::post('/utilisateurs/menu/{n?}', 'UpdateController@utilisateurs')->where('n', '[0-9]+')->middleware('authControl');
Route::get('/utilisateurs/delete/{n?}', 'DeleteController@utilisateurs')->middleware('authControl')->where('n', '[0-9]+')->name('UtilisateursDelete');
Route::get('/utilisateurs/menu/{n?}', 'MenuController@utilisateurs')->where('n', '[0-9]+')->middleware('authControl')->name('UtilisateursMenu');

Route::get('/historique', 'HomeController@historique')->name('Historique');
Route::get('/historique/download', 'HomeController@historiqueDownload')->name('HistoriqueDownload');

// accueil pour lister tous les badges
Route::get('/badges', 'HomeController@badges')->name('Badges');
// route formulaire pour ajouter un badge et le sauvegarder dans la bdd
//Route::get('/badges/create', function(){return view('badgesCreate');})->name('BadgesNew');
Route::get('/badges/create', 'EditController@badgesNew')->name('BadgesNew');
Route::post('/badges/create', 'CreateController@badges');
// route pour editer un badge et le sauvegarder dans la bdd
Route::get('/badges/edit/{n?}', 'EditController@badges')->where('n', '[0-9]+')->name('BadgesEdit');
Route::post('/badges/edit/{n?}', 'UpdateController@badges')->where('n', '[0-9]+')->name('BadgesUpdate');
// route pour la suppression d'un badge dans la bdd
Route::get('/badges/delete/{n?}', 'DeleteController@badges')->middleware('authControl')->where('n', '[0-9]+')->name('BadgesDelete');
Route::get('/badges/menu/{n?}', 'MenuController@badges')->where('n', '[0-9]+')->middleware('authControl')->name('BadgesMenu');
Route::get('/badges/menu/restriction/{n?}', 'RestrictionController@badges')->where('n', '[0-9]+')->name('BadgesRestriction');

//TEST : Route pour la vue badgesConfigRestriction.blade.php
//Route::get('/badges/menu/restriction/zone{n?}', 'testZoneController@badges')->where('n', '[0-9]+')->name('BadgeConfigRestriction');

// Routes partie zones
Route::get('/infrastructure/zones', 'HomeController@zones')->middleware('authControl')->name('Zones');
// Edition zones
Route::get('/infrastructure/zones/edit/{n?}', 'EditController@zones')->middleware('authControl')->where('n', '[0-9]+')->name('ZonesEdit');
Route::post('/infrastructure/zones/edit/{n?}', 'UpdateController@zones')->middleware('authControl')->where('n', '[0-9]+')->name('ZonesUpdate');
// Création zones
Route::get('/infrastructure/zones/create', function(){return view('zonesCreate');})->name('ZonesNew');
Route::post('/infrastructure/zones/create', 'CreateController@zones');
// Suppression zones
Route::get('/infrastructure/zones/delete/{n?}', 'DeleteController@zones')->middleware('authControl')->where('n', '[0-9]+')->name('ZonesDelete');
//Menu zones
Route::get('/infrastructure/zones/menu/{n?}', 'MenuController@zones')->where('n', '[0-9]+')->middleware('authControl')->name('ZonesMenu');

// Routes partie portes
Route::get('/infrastructure/portes', 'HomeController@portes')->middleware('authControl')->name('Portes');
// Edition portes
Route::get('/infrastructure/portes/edit/{n?}', 'EditController@portes')->middleware('authControl')->where('n', '[0-9]+')->name('PortesEdit');
Route::post('/infrastructure/portes/edit/{n?}', 'UpdateController@portes')->middleware('authControl')->where('n', '[0-9]+')->name('PortesUpdate');
// Création portes
Route::get('/infrastructure/portes/create', 'EditController@porteNew')->name('PortesNew');
Route::post('/infrastructure/portes/create', 'CreateController@portes');
// Suppression portes
Route::get('/infrastructure/portes/delete/{n?}', 'DeleteController@portes')->middleware('authControl')->where('n', '[0-9]+')->name('PortesDelete');
//Menu portes
Route::get('/infrastructure/portes/menu/{n?}', 'MenuController@portes')->where('n', '[0-9]+')->middleware('authControl')->name('PortesMenu');


// Routes partie salles
Route::get('/infrastructure/salles', 'HomeController@salles')->middleware('authControl')->name('Salles');
// Edition salles
Route::get('/infrastructure/salles/edit/{n?}', 'EditController@salles')->middleware('authControl')->where('n', '[0-9]+')->name('SallesEdit');
Route::post('/infrastructure/salles/edit/{n?}', 'UpdateController@salles')->middleware('authControl')->where('n', '[0-9]+')->name('SallesUpdate');
// Création salles
Route::get('/infrastructure/salles/create', 'EditController@salleNew')->name('SallesNew');
Route::post('/infrastructure/salles/create', 'CreateController@salles');
// Suppression salles
Route::get('/infrastructure/salles/delete/{n?}', 'DeleteController@salles')->middleware('authControl')->where('n', '[0-9]+')->name('SallesDelete');
//Menu salles
Route::get('/infrastructure/salles/menu/{n?}', 'MenuController@salles')->where('n', '[0-9]+')->middleware('authControl')->name('SallesMenu');


// Routes partie gaches
Route::get('/infrastructure/gaches', 'HomeController@gaches')->middleware('authControl')->name('Gaches');
// Edition gaches
Route::get('/infrastructure/gaches/edit/{n?}', 'EditController@gaches')->middleware('authControl')->where('n', '[0-9]+')->name('GachesEdit');
Route::post('/infrastructure/gaches/edit/{n?}', 'UpdateController@gaches')->middleware('authControl')->where('n', '[0-9]+')->name('GachesUpdate');
// Création gaches
Route::get('/infrastructure/gaches/create', function(){return view('gachesCreate');})->name('GachesNew');
Route::post('/infrastructure/gaches/create', 'CreateController@gaches');
// Suppression gaches
Route::get('/infrastructure/gaches/delete/{n?}', 'DeleteController@gaches')->middleware('authControl')->where('n', '[0-9]+')->name('GachesDelete');
// Menu gaches
Route::get('/infrastructure/gaches/menu/{n?}', 'MenuController@gaches')->where('n', '[0-9]+')->middleware('authControl')->name('GachesMenu');


// Routes partie lecteurs
Route::get('/infrastructure/lecteurs', 'HomeController@lecteurs')->middleware('authControl')->name('Lecteurs');
// Edition lecteurs
Route::get('/infrastructure/lecteurs/edit/{n?}', 'EditController@lecteurs')->middleware('authControl')->where('n', '[0-9]+')->name('LecteursEdit');
Route::post('/infrastructure/lecteurs/edit/{n?}', 'UpdateController@lecteurs')->middleware('authControl')->where('n', '[0-9]+')->name('LecteursUpdate');
// Création lecteurs
Route::get('/infrastructure/lecteurs/create', 'EditController@lecteurNew')->name('LecteursNew');
Route::post('/infrastructure/lecteurs/create', 'CreateController@lecteurs');
// Suppression lecteurs
Route::get('/infrastructure/lecteurs/delete/{n?}', 'DeleteController@lecteurs')->middleware('authControl')->where('n', '[0-9]+')->name('LecteursDelete');
//Menu lecteurs
Route::get('/infrastructure/lecteurs/menu/{n?}', 'MenuController@lecteurs')->where('n', '[0-9]+')->middleware('authControl')->name('LecteursMenu');
