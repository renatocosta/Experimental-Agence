<?php

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

Route::group(['middleware' => ['basic_auth'], 'prefix' => 'v1'], function () {
    require base_path('bundle/Backoffice/Consultant/Infrastructure/Http/routes.php');    
});
