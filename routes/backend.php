<?php

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::group(['middleware' => 'admin'], function()
{
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'Auth\RegisterController@register');
});

Route::group([ 'middleware' => 'auth:admin'], function(){
	Route::resource('news', 'NewsController');
	Route::resource('newsImage', 'NewsImageController');
	Route::get('/news/{id}/removeImage', 'NewsController@removeImage');

	Route::resource('headServices', 'HeadServicesController');
	Route::get('headServices/create/{name}', 'HeadServicesController@create')->name('headcreate');
	Route::post('headServices/store/{name}', 'HeadServicesController@store')->name('headstore');

	Route::resource('contentServices', 'ContentServicesController');
	Route::get('services/{name}', 'ContentServicesController@index')->name('index');
	Route::get('contentServices/create/{name}', 'ContentServicesController@create')->name('contentcreate');
	Route::post('contentServices/store/{name}', 'ContentServicesController@store')->name('contentstore');

	Route::resource('directories', 'DirectoryController');

	Route::resource('directorylorem', 'DirectoryLoremController');

	Route::resource('structures', 'StructureController');

	Route::resource('structurelorem', 'StructureLoremController');

	Route::resource('partners', 'PartnerController');

	Route::resource('partnerlorem', 'PartnerLoremController');

	Route::resource('mediaProducts', 'MediaProductController');
	Route::get('products/{name}', 'MediaProductController@index')->name('mediaIndex');
	Route::get('mediaProducts/create/{name}', 'MediaProductController@create')->name('mediaCreate');
	Route::post('mediaProducts/store/{name}', 'MediaProductController@store')->name('mediaStore');
	Route::post('mediaProducts/update/{id}', 'MediaProductController@update')->name('mediaUpdate');

	Route::resource('trainings', 'TrainingController');
	Route::get('training/create/{name}', 'TrainingController@create')->name('trainingCreate');
	Route::post('training/store/{name}', 'TrainingController@store')->name('trainingStore');
	Route::post('training/update/{id}', 'TrainingController@update')->name('trainingUpdate');

	Route::resource('wsaAboutContext', 'ContentWsaAboutContextController');
	Route::get('AboutContext/{name}', 'ContentWsaAboutContextController@index')->name('contentAboutContextIndex');
	Route::get('contentWsaAboutContext/create/{name}', 'ContentWsaAboutContextController@create')->name('contentAboutContextCreate');
	Route::post('contentWsaAboutContext/store/{name}', 'ContentWsaAboutContextController@store')->name('contentAboutContextStore');

	Route::resource('headWsaAboutContext', 'HeadWsaAboutContextController');
	Route::get('headWsaAboutContext/create/{name}', 'HeadWsaAboutContextController@create')->name('headAboutContextCreate');
	Route::post('headWsaAboutContext/store/{name}', 'HeadWsaAboutContextController@store')->name('headAboutContextStore');

	Route::resource('wsaPriPartTar', 'PriPartTarController'); //global and rule includes after
	Route::get('priPartTar/{name}', 'PriPartTarController@index')->name('priPartTarIndex');
	Route::get('wsaPriPartTar/create/{name}', 'PriPartTarController@create')->name('priPartTarCreate');
	Route::post('wsaPriPartTar/store/{name}', 'PriPartTarController@store')->name('priPartTarStore');

	Route::resource('gallery', 'GalleryController');

	Route::resource('wsaglobal', 'WsaGlobalController');

	Route::resource('preferences', 'PreferenceController');
	Route::get('preference/create/{name}', 'PreferenceController@create')->name('preferenceCreate');
	Route::post('preference/store/{name}', 'PreferenceController@store')->name('preferenceStore');

	Route::resource('commoninfo', 'CommonInfoController');

	Route::resource('commoninfolorem', 'CommonInfoLoremController');

	Route::resource('easySponsors', 'EasySponsorController');

	Route::resource('homeslider', 'HomeSliderController');


});
