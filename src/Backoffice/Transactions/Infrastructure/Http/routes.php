<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Backoffice\Transactions\Infrastructure\Http\Controllers'], function() {

  Route::get('transactions', ['uses' => 'TransactionsController@getAll']);      
  Route::post('transactions/creditcard', ['uses' => 'TransactionsCreditCardController@add']);
  Route::get('transactions/creditcard/{id}', ['uses' => 'TransactionsCreditCardController@getById']);  
  Route::post('transactions/slip', ['uses' => 'TransactionsSlipController@add']);
  Route::get('transactions/slip/{id}', ['uses' => 'TransactionsSlipController@getById']);    
  
});    
