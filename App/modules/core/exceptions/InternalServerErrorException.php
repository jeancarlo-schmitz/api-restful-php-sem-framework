<?php
/**
 * Created by PhpStorm.
 * User: jean.schmitz
 * Date: 05/06/2023
 * Time: 14:46
 */

namespace core\exceptions;

use Exception;
use core\exceptions\constants\HttpExceptionConstans;

class InternalServerErrorException extends Exception
{
    public function __construct()
    {
        parent::__construct(HttpExceptionConstans::INTERNAL_SERVER_ERROR_MESSAGE, HttpExceptionConstans::INTERNAL_SERVER_ERROR_CODE);
    }
}