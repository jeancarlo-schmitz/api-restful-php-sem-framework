<?php

namespace core\exceptions\handlers;

use core\exceptions\constants\HttpExceptionConstans;
use Exception;
use ADODB_Exception;
use http\Response;

class ADODBExceptionhandler
{
    public function canHandle(Exception $e){
        if ($e instanceof ADODB_Exception) {
            return true;
        }

        return false;
    }

    public function handle(Exception $e)
    {
        if(IS_DEV){
            pred($e);
        }
        if ($e instanceof ADODB_Exception) {
            return new Response(HttpExceptionConstans::INTERNAL_SERVER_ERROR_MESSAGE, HttpExceptionConstans::INTERNAL_SERVER_ERROR_CODE);
        }

    }
}