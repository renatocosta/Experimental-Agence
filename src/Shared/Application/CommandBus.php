<?php

namespace Shared\Application;

interface CommandBus
{
    public function subscribe($command, $handler);
    
    public function handle($command);
    
}