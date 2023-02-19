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
session_start();
/*----------------------
  ГЛАВНАЯ СТРАНИЦА(ЛОГИН)
 -----------------------*/

Route::get('/','MainController@index')->name('index');
Route::get('/errors','MainController@index_errors')->name('error');

/*-----------------------------------
 ОБРАБОТЧИК ГЛАВНОЙ СТРАНИЦЫ (ЛОГИН)
 ------------------------------------*/

Route::post('/login','MainController@login')->name('login');

/*----------------------
        ТАБЛИЦА 1
 -----------------------*/

Route::get('/tb_one','MainController@table_one')->name('tb_one');

/*----------------------
        ТАБЛИЦА 2
 -----------------------*/

Route::get('/tb_two','MainController@table_two')->name('tb_two');
Route::get('/tb_two/delete/{id?}','MainController@delete_man')->name('tb_two_del');

/*------------------------------
  ПОДРОБНАЯ ИНФОМРАИЦЯ О ЗАЯВКЕ
 -------------------------------*/

Route::get('/info/more/{id?}','MainController@info')->name('info');

/*------------------------------
     СТРАНИЦА СОЗДАНИЯ ЗАЯВКИ
 -------------------------------*/

Route::get('/CreateZap','MainController@create_zap_get')->name('CreateZap');
Route::post('/CreateZap','MainController@create_zap_post')->name('CreateZap');


/*------------------------------
   СТРАНИЦА СОЗДАНИЯ СОТРУДНИКА
 -------------------------------*/

Route::get('/CreateMan','MainController@create_man_get')->name('CreateMan');
Route::post('/CreateMan','MainController@create_man_post')->name('CreateMan');
