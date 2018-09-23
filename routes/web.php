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

Route::get('/', 'HomeController@index')->name('home');


//Panel routes
Route::resources([
    'users' => 'UserController',
    'abilities' => 'AbilityController',
    'roles' => 'RoleController'
]);


Route::post('/change_active_user', 'UserController@changeActive');
Route::post('/change_admin_user', 'UserController@changeAdmin');
Route::post('/assign_new_role', ['uses' => 'UserController@assignrole','as' => 'assign_new_role']);
Route::post('/remove_role/{user}/{role_name}', ['uses' => 'UserController@removeRole','as' => 'remove_role']);

Route::post('/change_active_role', 'RoleController@changeActive');
Route::post('/assign_new_ability', ['uses' => 'RoleController@assignAbility','as' => 'assign_new_ability']);
Route::post('/remove_ability/{role_name}/{ability_id}', ['uses' => 'RoleController@removeAbility','as' => 'remove_ability']);

Route::post('/change_active_ability', 'AbilityController@changeActive');
