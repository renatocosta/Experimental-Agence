<?php
declare(strict_types=1);
namespace Shared\Application;

use Shared\Application\CommandBus;

class SimpleCommandBus implements CommandBus
{
    private $commands;
    
    public function __construct()
    {
    
    }
    
    public function subscribe($command, $handler)
    {
        $this->commands[$command][] = $handler;
    }
    
    public function handle($command)
    {
        $commandClass = get_class($command);
        if (isset($this->commands[$commandClass])) {
            foreach ($this->commands[$commandClass] as $handlerClass) {
                $handler = app($handlerClass);
                $handler->handle($command);
            }
        } else {
            throw new \Exception("Command {$commandClass} does not have any handler mapped");
        }
        
    }
    
}
