<?php

namespace core\exceptions;

use Exception;
use core\exceptions\constants\HttpExceptionConstans;

class NotFoundException extends exception
{
    public function __construct()
    {
        parent::__construct(HttpExceptionConstans::NOT_FOUND_MESSAGE, HttpExceptionConstans::NOT_FOUND_CODE);
    }
}