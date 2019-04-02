<?php

namespace Backoffice\Consultant\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use Shared\Application\CommandBus;
use Backoffice\Consultant\Application\Command\QueryConsultantCommand;

class ConsultantController extends Controller
{

    public function getAll(CommandBus $commandBus) {
        
        try {
          
            $command = new QueryConsultantCommand();
            $commandBus->handle($command);
            $this->responseData = array_merge(['status' => $this->success_response], ['data' => $command->getData()]);
           
        } catch (\Exception $e) {
            return response()->json(['status' => $this->fail_response, 'message' => 'Internal error occurred while querying transactions table'], 422);
        }        
        
        return response()->json($this->responseData);
        
    }
    
    
}