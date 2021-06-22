


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

Route::get('/', function () {
    return view('welcome');
});




Auth::routes();

Route::prefix('home')->group(function() {

    Route::get('/Gestion-Comptes', 'HomeController@gestcp')->name('GestionComptes');
	Route::get('/', 'HomeController@index')->name('home');
});



Route::get('/Aceuil', 'AceuilController@Aceuil')->name('Aceuil');

Route::prefix('Invite')->group(function() {

	Route::get('/ServiceLogin', 'Auth\UtilisateursLoginController@showLoginForm')->name('ServiceLogin');
    Route::get('/InscriptionUtilisateur', 'UtilisateursRegisterController@reg')->name('InscriptionUtilisateur');
    Route::post('/ServiceLogin', 'Auth\UtilisateursLoginController@login')->name('ServiceLogin.submit');
    Route::post('/InscriptionUtilisateur', 'UtilisateursRegisterController@create');
    Route::get('/', 'InviteController@index')->name('Invite');


});





Route::get('/Utilisateursactivation','Auth\RegisterController@userActivation');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});