<?php

namespace Backoffice\Client\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use Shared\Application\CommandBus;
use Illuminate\Http\Request;
use Backoffice\Client\Application\Command\QueryClientByPerformanceCommand;
use Backoffice\Client\Application\Command\ClientByPerformanceCalculationsCommand;

class ClientByPerformanceController extends Controller
{

    public function listByCriteria(Request $request, CommandBus $commandBus) {
        try {
            $command = new QueryClientByPerformanceCommand(['user' => $request->get('username'), 'period' => ['start' => $request->get('period')['start_date'], 'end' => $request->get('period')['end_date']]]);
            $commandBus->handle($command);
            $this->responseData = array_merge(['status' => $this->success_response], ['data' => $command->getData()]);
           
        } catch (\Exception $e) {
            echo $e->getMessage();exit;
            return response()->json(['status' => $this->fail_response, 'message' => 'Internal error occurred while querying transactions table'], 422);
        }        
        
        return response()->json($this->responseData);
        
    }
    
    public function listByCriteriaAndAverage(Request $request, CommandBus $commandBus) {
        
        try {
            $command = new QueryClientByPerformanceCommand(['user' => $request->get('username'), 'period' => ['start' => $request->get('period')['start_date'], 'end' => $request->get('period')['end_date']]]);
            $commandBus->handle($command);
            
            $commandCalculations = new ClientByPerformanceCalculationsCommand($command->getData());
            $commandBus->handle($commandCalculations);            
            $data = $commandCalculations->getDataService();
            
            $this->responseData = array_merge(['status' => $this->success_response], ['data' => $data->getCollection(), 'total' => $data->getTotal(), 'cost_average' => $data->getAverage()]);
            
        } catch (\Exception $e) {
            return response()->json(['status' => $this->fail_response, 'message' => 'Internal error occurred while querying transactions table'], 422);
        }        
        
        return response()->json($this->responseData);
        
    }    
    
}