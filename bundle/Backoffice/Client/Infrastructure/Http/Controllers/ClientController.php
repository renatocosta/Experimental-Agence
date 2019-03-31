<?php

namespace Backoffice\Client\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use Shared\Application\CommandBus;
use Backoffice\Client\Application\Command\QueryClientCommand;

class ClientController extends Controller
{

    public function getAll(CommandBus $commandBus) {
        
        try {
          
            $command = new QueryClientCommand();
            $commandBus->handle($command);
            $this->responseData = array_merge(['status' => $this->success_response], ['data' => $command->getData()]);
           
        } catch (\Exception $e) {
            echo $e->getMessage();exit;
            return response()->json(['status' => $this->fail_response, 'message' => 'Internal error occurred while querying transactions table'], 422);
        }        
        
        return response()->json($this->responseData);
        
    }
    
    
}