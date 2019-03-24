<?php

namespace Backoffice\Transactions\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use Backoffice\Transactions\Infrastructure\Http\Requests\CreateSlipTransactionRequest;
use Shared\Application\CommandBus;
use Backoffice\Transactions\Application\Command\CreateTransactionCommand;
use Backoffice\Payments\Application\Command\CreateSlipTransactionCommand;
use Backoffice\Payments\Application\Command\QuerySlipTransactionCommand;
use App\Facades\GCloudLogging;
use Illuminate\Http\Request;

class TransactionsSlipController extends Controller
{
    
    public function add(CreateSlipTransactionRequest $request, CommandBus $commandBus)
    {
        
        try {

           $command = new CreateTransactionCommand($request->get('buyerid'), $request->get('waypaymentid'), $request->get('amount')); 
           $commandBus->handle($command);

           $slipCommand = new CreateSlipTransactionCommand($command->getTransactionId());
           $commandBus->handle($slipCommand);
           
            GCloudLogging::info("Transaction by Slip was performed");           
           
        } catch (\Exception $e) {
            return response()->json(['status' => $this->fail_response, 'message' => 'Didn\'t save'], 422);
        }

        return response()->json(['status' => $this->success_response, 'slip_number' => $slipCommand->getNumber()]);

    }
    
    public function getById(Request $request, $id, CommandBus $commandBus) {
        
        try {
          
            $command = new QuerySlipTransactionCommand($id);
            $commandBus->handle($command);
           
            $this->responseData = $command->getData();
           
        } catch (\Exception $e) {
            echo $e->getMessage();exit;
            return response()->json(['status' => $this->fail_response, 'message' => 'Internal error occurred while querying transactions table'], 422);
        }        
        
        return response()->json(['status' => $this->success_response, 'data' => $this->responseData]);
        
    }    
    
}