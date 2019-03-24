<?php

namespace Backoffice\Transactions\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use Backoffice\Transactions\Infrastructure\Http\Requests\CreateCreditCardTransactionRequest;
use Shared\Application\CommandBus;
use Backoffice\Transactions\Application\Command\CreateTransactionCommand;
use Backoffice\Payments\Application\Command\CreateCreditCardTransactionCommand;
use Backoffice\Payments\Application\Command\QueryCreditCardTransactionCommand;
use Illuminate\Http\Request;
use App\Facades\GCloudLogging;

class TransactionsCreditCardController extends Controller
{
  
    public function add(CreateCreditCardTransactionRequest $request, CommandBus $commandBus)
    {
        
        try {
           
           $command = new CreateTransactionCommand($request->get('buyerid'), $request->get('waypaymentid'), $request->get('amount')); 
           $commandBus->handle($command);
           
           $creditCardCommand = new CreateCreditCardTransactionCommand($command->getTransactionId(), $request->get('creditcard_details')['holder_name'], $request->get('creditcard_details')['number'], $request->get('creditcard_details')['expiration_date'], $request->get('creditcard_details')['cvv']);
           $commandBus->handle($creditCardCommand);           
           
            GCloudLogging::info("Transaction by Credit Card was performed");
           
        } catch (\Exception $e) {
            return response()->json(['status' => $this->fail_response, 'message' => 'Didn\'t save'], 422);
        }

        return response()->json(['status' => $this->success_response]);

    }
    
    public function getById(Request $request, $id, CommandBus $commandBus) {
        
        try {
          
            $command = new QueryCreditCardTransactionCommand($id);
            $commandBus->handle($command);
           
            $this->responseData = $command->getData();
           
        } catch (\Exception $e) {
            echo $e->getMessage();exit;
            return response()->json(['status' => $this->fail_response, 'message' => 'Internal error occurred while querying transactions table'], 422);
        }        
        
        return response()->json(['status' => $this->success_response, 'data' => $this->responseData]);
        
    }
    
}