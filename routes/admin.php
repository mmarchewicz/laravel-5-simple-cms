<?php

Route::get('/', ['as' => 'dashboard.index', 'uses' => 'DashboardController@getIndex']);
Route::resource('article', 'ArticleController');
Route::resource('category', 'CategoryController');
Route::resource('page', 'PageController');
Route::resource('user', 'UserController');

Route::get('/translations/view/{groupKey?}', ['as' => 'translation-view', 'uses' => 'TranslationsController@getView'])->where('groupKey', '.*');
Route::get('/translations/{groupKey?}', ['as' => 'translation-view-index', 'uses' => 'TranslationsController@getIndex'])->where('groupKey', '.*');
Route::post('/translations/add/{groupKey}', ['as' => 'translation-add', 'uses' => 'TranslationsController@postAdd'])->where('groupKey', '.*');
Route::post('/translations/edit/{groupKey}', ['as' => 'translation-edit', 'uses' => 'TranslationsController@postEdit'])->where('groupKey', '.*');
Route::post('/translations/groups/add', ['as' => 'translation-groups-add', 'uses' => 'TranslationsController@postAddGroup']);
Route::post('/translations/delete/{groupKey}/{translationKey}', ['as' => 'translation-groups-delete-key', 'uses' => 'TranslationsController@postDelete'])->where('groupKey', '.*');
Route::post('/translations/import', ['as' => 'translation-import', 'uses' => 'TranslationsController@postImport']);
Route::post('/translations/find', ['as' => 'translation-find', 'uses' => 'TranslationsController@postFind']);
Route::post('/translations/locales/add', ['as' => 'translation-locales-add', 'uses' => 'TranslationsController@postAddLocale']);
Route::post('/translations/locales/remove', ['as' => 'translation-locales-remove', 'uses' => 'TranslationsController@postRemoveLocale']);
Route::post('/translations/publish/{groupKey}', ['as' => 'translation-publish', 'uses' => 'TranslationsController@postPublish'])->where('groupKey', '.*');

