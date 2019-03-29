<?php
 
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Backoffice\Consultant\Infrastructure\Http\Controllers'], function() {

  Route::get('consultant', ['uses' => 'ConsultantController@getAll']);      
  Route::post('consultant/performance', ['uses' => 'ConsultantByPerformanceController@listByCriteria']);  
  
});    