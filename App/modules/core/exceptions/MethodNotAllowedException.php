<?php

namespace core\exceptions;

use Exception;
use core\exceptions\constants\HttpExceptionConstans;

class MethodNotAllowedException extends Exception
{
    public function __construct()
    {
        parent::__construct(HttpExceptionConstans::METHOD_NOT_ALLOWED_MESSAGE, HttpExceptionConstans::METHOD_NOT_ALLOWED_CODE);
    }
}