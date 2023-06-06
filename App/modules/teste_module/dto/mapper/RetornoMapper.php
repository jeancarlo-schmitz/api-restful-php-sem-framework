<?php

namespace teste_module\dto\mapper;

use teste_module\dto\RetornoDto;

class RetornoMapper
{
    public function mapDataToObject($param1, $param2) {
        $retornoDto = new RetornoDto();
        $retornoDto->setParam1($param1);
        $retornoDto->setParam2($param2);

        return $retornoDto->toArray();
    }
}