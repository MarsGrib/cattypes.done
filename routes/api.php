<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//FILTERS apis
Route::group(['prefix'=>'filter'],function(){
    Route::get('list',[
        'uses' => 'App\Http\Controllers\Api\Market\Filter@list',
        'as' =>'api.filter.list'
    ]);

    Route::get('run',[
        'uses' => 'App\Http\Controllers\Api\Market\Product@getSearchHashByFilters',
        'as' =>'api.products.get.hash.by.filters'
    ]);

    Route::get('result',[
        'uses' => 'App\Http\Controllers\Api\Market\Product@getResultByHash',
        'as' =>'api.products.get.results.by.hash'
    ]);
});

// category CRUD
Route::group(['prefix'=>'market'],function(){

    Route::group(['prefix'=>'category'],function(){
        Route::get('get',[
            'uses' => 'App\Http\Controllers\Api\Market\Category@getById',
            'as' =>'api.market.category.get.by.id'
        ]);
    
        Route::post('add',[
            'uses' => 'App\Http\Controllers\Api\Market\Category@add',
            'as' =>'api.market.category.add'
        ]);
    
        Route::post('update',[
            'uses' => 'App\Http\Controllers\Api\Market\Category@edit',
            'as' =>'api.market.category.update'
        ]);
        Route::post('remove',[
            'uses' => 'App\Http\Controllers\Api\Market\Category@remove',
            'as' =>'api.market.category.remove'
        ]);
    });


});