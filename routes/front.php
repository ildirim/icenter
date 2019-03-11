<?php

/*
|-----------------------------------------------------------------------------
| Frontend Router
|-----------------------------------------------------------------------------
| */


Route::get('/','HomePageController@index' );

Route::get('wsa/price','HomePageController@wsaPrice' )->name('wsa_price');
Route::get('wsa/partner','HomePageController@wsaPartner' )->name('wsa_partner');
Route::get('partner','HomePageController@ourPartner' )->name('our_partner');
Route::get('wsa/target','HomePageController@wsaTarget' )->name('wsa_target');

Route::get('wsa2/about','HomePageController@wsaAbout' )->name('wsa_about');
Route::get('wsa2/context','HomePageController@wsaContext' )->name('wsa_context');

Route::get('gallery','HomePageController@wsagallery' )->name('gallery');

Route::get('rules','HomePageController@wsarules' )->name('rules');

Route::get('global','HomePageController@wsaglobal' )->name('global');

Route::get('easy_communal','HomePageController@communal' )->name('easy');
Route::get('service/training','HomePageController@training' )->name('training');
Route::get('service/seyyar','HomePageController@seyyar' )->name('seyyar');
Route::get('service/it','HomePageController@it' )->name('it');

Route::get('easy_pay','HomePageController@pay' )->name('easy_pay');
Route::get('easy_radio','HomePageController@radio' )->name('easy_radio');
Route::get('easy_visa','HomePageController@visa' )->name('easy_visa');
Route::get('electron','HomePageController@electron' )->name('electron');

Route::get('news','HomePageController@news' )->name('new');
Route::get('ajaxnews','HomePageController@ajaxnews' )->name('ajaxnews');

Route::get('news_single/{id}','HomePageController@news_single' )->name('news_single');

Route::get('partners','HomePageController@partners' )->name('partner');

Route::get('staffs','HomePageController@staffs' )->name('staffs');

Route::get('staff_single/{id}','HomePageController@staff_single' )->name('staff_single');

Route::get('structure','HomePageController@structure' )->name('structure');

Route::get('about','HomePageController@about' )->name('about');

Route::get('contact','HomePageController@contact' )->name('contact');