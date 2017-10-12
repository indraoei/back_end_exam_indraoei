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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'unit'], function() {
    Route::get('/getunit', function(){
        $unitList = DB::table('unit_rumahs')
        ->select('*')
        ->from('unit_rumahs')
        ->get();
        return response()->json($unitList, 200);
    });
    Route::post('/createunit', 'ProductController@CreateUnit');
    Route::post('/deleteunit', 'ProductController@DeleteUnit');
});

