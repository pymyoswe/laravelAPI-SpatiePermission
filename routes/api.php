<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::group(['middleware'=>'jwt.auth'],function(){

    Route::get('/userApi',[
        'uses'=>'ApiController@getUserApi',
        'as'=>'userApi'
    ]);

    Route::get('/userApi/{id}',[
        'uses'=>'ApiController@getUserApiById',
        'as'=>'userApi'
    ]);

});


Route::post('/apiToken',[
    'uses'=>'ApiTokenController@authenticate',
    'as'=>'apiToken'
]);

