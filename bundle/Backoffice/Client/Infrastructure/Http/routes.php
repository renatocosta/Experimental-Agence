<?php
 
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Backoffice\Client\Infrastructure\Http\Controllers'], function() {

  Route::get('client', ['uses' => 'ClientController@getAll']);      
  Route::post('client/performance', ['uses' => 'ClientByPerformanceController@listByCriteria']);  
  /*Route::post('Client/performanceandaverage', ['uses' => 'ClientByPerformanceController@listByCriteriaAndAverage']);  */
 
});    