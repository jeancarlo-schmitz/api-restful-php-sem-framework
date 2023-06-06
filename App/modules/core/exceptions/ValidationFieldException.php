<?php
/**
 * Created by PhpStorm.
 * User: jean.schmitz
 * Date: 05/06/2023
 * Time: 16:50
 */

namespace core\exceptions;
use core\exceptions\constants\ValidationExceptionConstants;
use Exception;


class ValidationFieldException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message, ValidationExceptionConstants::EMPTY_FIELD_CODE);
    }
}