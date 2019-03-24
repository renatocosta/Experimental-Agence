<?php

namespace Backoffice\Buyers\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use Backoffice\Buyers\Infrastructure\Http\Requests\CreateBuyerRequest;
use Backoffice\Buyers\Infrastructure\Http\Requests\UpdateBuyerRequest;
use Shared\Application\CommandBus;
use Backoffice\Buyers\Application\Command\CreateBuyerCommand;
use Backoffice\Buyers\Application\Command\UpdateBuyerCommand;

class BuyerController extends Controller
{
    
    public function add(CreateBuyerRequest $request, CommandBus $commandBus)
    {
                
        try {
          $command = new CreateBuyerCommand($request->get('clientid'), $request->get('name'), $request->get('mail'), $request->get('cpf')); 
          $commandBus->handle($command);
        } catch (\Exception $e) {
            return response()->json(['status' => $this->fail_response, 'message' => 'Didn\'t save'], 422);
        }

        return response()->json(['status' => $this->success_response]);

    }

    public function update(UpdateBuyerRequest $request, $buyerId, CommandBus $commandBus)
    {

        try {
          $command = new UpdateBuyerCommand($buyerId, $request->get('name'), $request->get('mail'), $request->get('cpf')); 
          $commandBus->handle($command);
        } catch (\Exception $e) {
           return response()->json(['status' => $this->fail_response, 'message' => 'Didn\'t save'], 422);
        }

        return response()->json(['status' => $this->success_response]);

    }
    
}