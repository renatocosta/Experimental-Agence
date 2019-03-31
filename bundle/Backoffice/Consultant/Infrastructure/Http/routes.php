<?php
 
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Backoffice\Consultant\Infrastructure\Http\Controllers'], function() {

  Route::get('consultant', ['uses' => 'ConsultantController@getAll']);      
  Route::post('consultant/performance', ['uses' => 'ConsultantByPerformanceController@listByCriteria']);  
  Route::post('consultant/performanceandaverage', ['uses' => 'ConsultantByPerformanceController@listByCriteriaAndAverage']);  
  Route::post('consultant/performanceandpercentage', ['uses' => 'ConsultantByPerformanceController@listByCriteriaAndPercentage']);  
 
});    