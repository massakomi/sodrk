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

Route::pattern('id', '[0-9]+');

Route::get('/', 'PagesController@index');

// about
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/news/{id?}', 'PagesController@news');
Route::get('/news/{name}', 'PagesController@newsPage')->where('name', '[A-Za-z_\d-]+');
Route::get('/projects/{id?}', 'PagesController@projects');
Route::get('/actions/{id?}', 'PagesController@actions');
Route::any('/contacts/{id?}', 'PagesController@contacts');
Route::get('/vacancies', 'PagesController@vacancies');
Route::match(['get', 'post'], '/vacancy/{id}', 'PagesController@vacancy');

// Каталог
Route::get('/catalog', 'PagesController@catalog');
Route::get('/catalog/{section}', 'PagesController@catalogSection');
Route::get('/retail', 'PagesController@retail');
Route::get('/discount-programm', 'PagesController@discountProgramm');
Route::get('/retail-payment-delivery', 'PagesController@retailPaymentDelivery');
Route::get('/certificates', 'PagesController@certificates');

// Корпоративный
Route::any('/corporate', 'PagesController@corporate');
Route::any('/clients/{id?}', 'PagesController@clients');
Route::any('/for-dealers', 'PagesController@forDealers');
Route::any('/corp-payment-delivery', 'PagesController@corpPaymentDelivery');
Route::any('/statuses', 'PagesController@statuses');
Route::any('/corporate/price-list', 'PagesController@corporatePrice');

// 1С
Route::get('/1C', 'PagesController@c1');

// Сети и системы безопасности
Route::get('/security', 'PagesController@security');
Route::match(['get', 'post'], '/request/security/{id?}', 'PagesController@requestSecurity');
Route::get('/security/services', 'PagesController@securityServices');

// Сервисный центр
Route::get('/services', 'PagesController@services');

// Абонентское обслуживание
Route::get('/subscription-service', 'PagesController@subscriptionService');
Route::get('/subscription-services/services', 'PagesController@subscriptionServices');
Route::get('/subscription-services/tariffs', 'PagesController@subscriptionTariffs');
Route::get('/subscription-service/calc', 'PagesController@subscriptionCalc');

// Формы
Route::match(['get', 'post'], '/request/form/item-price', 'PagesController@requestItemPrice');

// Авторизация
Route::get('cabinet', 'PagesController@cabinet');
Route::get('cabinet/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('cabinet/login', 'Auth\LoginController@login');
Route::get('cabinet/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::post('cabinet/logout', 'Auth\LoginController@logout');
Route::get('cabinet/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('cabinet/register', 'Auth\RegisterController@register');


// Тест
Route::get('/import', 'ImportController');
Route::get('/test', 'TestController@test');
//Route::get('/category', 'CategoryController@category');
//Route::post('/category/add', 'CategoryController@categoryAdd');