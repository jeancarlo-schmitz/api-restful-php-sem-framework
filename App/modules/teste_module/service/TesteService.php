<?php

namespace teste_module\service;

use teste_module\dao\TesteDao;
use teste_module\dto\mapper\RetornoMapper;

class TesteService
{
    private $dao;

    public function __construct()
    {
        $this->dao = new TesteDao();
    }

    public function getRetornoComDto($param1, $param2){
        // executa as regras e monte o dto
        return $this->montaRetornoDto($param1, $param2);
    }

    private function montaRetornoDto($param1, $param2){
        $retornoMapper = new RetornoMapper();

        return $retornoMapper->mapDataToObject($param1, $param2);
    }
}