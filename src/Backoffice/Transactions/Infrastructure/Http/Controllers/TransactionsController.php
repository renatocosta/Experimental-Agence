<?php

namespace Backoffice\Transactions\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use Backoffice\Transactions\Application\Command\QueryTransactionCommand;
use Illuminate\Http\Request;
use Shared\Application\CommandBus;

class TransactionsController extends Controller
{
    
    public function getAll(Request $request, CommandBus $commandBus) {
        
        try {
           
           $command = new QueryTransactionCommand(); 
           $commandBus->handle($command);
           
           $this->responseData = $command->getData();
           
        } catch (\Exception $e) {
            echo $e->getMessage();exit;
            return response()->json(['status' => $this->fail_response, 'message' => 'Internal error occurred while querying transactions table'], 422);
        }        
        
        return response()->json(['status' => $this->success_response, 'data' => $this->responseData]);
        
    }
    
}