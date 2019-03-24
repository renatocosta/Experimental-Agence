<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Backoffice\Buyers\Infrastructure\Http\Controllers'], function() {

  Route::post('buyers', ['uses' => 'BuyerController@add']);
  Route::put('buyers/{buyerid}', ['uses' => 'BuyerController@update']);
  
});    
