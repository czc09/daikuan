<?php
/**
 * Created by PhpStorm.
 * User: czcofo
 * Date: 2018/3/16
 * Time: 下午5:47
 */

Route::group(['namespace' => 'Home', 'prefix' => 'home'], function () {
    Route::get('one', 'IndexController@index');
    Route::get('two', 'IndexController@two');
    Route::get('three', 'IndexController@three');
    Route::post('form/post', 'IndexController@from');
});