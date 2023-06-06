<?php

namespace teste_module\exceptions;

use Exception;
use teste_module\exceptions\constants\TesteModuleExceptionConstants;

class TesteRotaComException extends Exception
{

    public function __construct()
{
    parent::__construct(TesteModuleExceptionConstants::TESTE_ROTA_COM_EXCEPTION_MESSAGE, TesteModuleExceptionConstants::TESTE_ROTA_COM_EXCEPTION_CODE);
}
}