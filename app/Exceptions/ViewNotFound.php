<?php

namespace App\Exceptions;

use Exception;

class ViewNotFound extends \Exception
{
    public function __construct($viewName, $controller, $message = "", $code = 0, Exception $previous = null)
    {
        $message = sprintf('View not defined for key %s in controller %s', $viewName, $controller);
        parent::__construct($message, $code, $previous);
    }

}