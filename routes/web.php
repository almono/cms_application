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


Auth::routes();

Route::get('/admin/logout', ['uses' => 'Panel\UserController@admin_logout', 'as' => 'admin_logout']);

Route::get('/', 'Front\HomeController@index')->name('home');
Route::get('/admin', 'Panel\HomeController@panel')->name('admin');

//Panel routes
Route::group(['prefix' => 'admin'], function() {
    Route::resource('users','Panel\UserController');
    Route::resource('abilities','Panel\AbilityController');
    Route::resource('roles','Panel\RoleController');
    Route::resource('menu','Panel\MenuController');
    Route::resource('pages','Panel\PageController');
});

/* PANE ROUTES */

Route::post('/admin/change_active_user', 'Panel\UserController@changeActive');
Route::post('/admin/change_admin_user', 'Panel\UserController@changeAdmin');
Route::post('/admin/assign_new_role', ['uses' => 'Panel\UserController@assignrole','as' => 'assign_new_role']);
Route::post('/admin/remove_role/{user}/{role_name}', ['uses' => 'Panel\UserController@removeRole','as' => 'remove_role']);

Route::post('/admin/change_active_role', 'Panel\RoleController@changeActive');
Route::post('/admin/assign_new_ability', ['uses' => 'Panel\RoleController@assignAbility','as' => 'assign_new_ability']);
Route::post('/admin/remove_ability/{role_name}/{ability_id}', ['uses' => 'Panel\RoleController@removeAbility','as' => 'remove_ability']);

Route::post('/admin/change_active_ability', 'Panel\AbilityController@changeActive');

Route::post('/admin/change_active_menu', 'Panel\MenuController@changeActive');

Route::post('/admin/change_active_page', 'Panel\PageController@changeActive');

Route::get('/admin/new_page', ['uses' => 'Panel\PageController@newPage', 'as' => 'new_page_form']);
Route::get('/admin/my_account', ['uses' => 'Panel\UserController@getMyAccount', 'as' => 'admin_my_account']);

/* FRONT ROUTES */

Route::get('/about-me', ['uses' => 'Front\HomeController@AboutMe', 'as' => 'about-me']);
Route::get('/page/{page_slug}', ['uses' => 'Front\PageController@showPage', 'as' => 'show_page']);