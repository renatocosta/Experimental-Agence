<?php

namespace Shared\Domain\Exception;

use App\Facades\GCloudLogging;

class DomainErrorException extends \Exception
{ 
    public function __construct($message, $code = 0, \Exception $previous = null) {
        GCloudLogging::error($message);          
        parent::__construct($message, $code, $previous);
    }
    
}
