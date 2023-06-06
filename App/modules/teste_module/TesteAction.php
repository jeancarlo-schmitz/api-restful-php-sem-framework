<?php
namespace teste_module;

use core\CoreAction;
use core\exceptions\constants\HttpExceptionConstans;
use http\Request;
use http\Response;
use system\ValidationRules;
use teste_module\exceptions\TesteRotaComException;
use teste_module\service\TesteService;

class TesteAction extends CoreAction
{

    private $service;

    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->service = new TesteService();
    }

    public function testeRota(){

        return new Response("Esse é um teste de rota", HttpExceptionConstans::OK_CODE);
    }

    public function testeRotaComParametros(){

        $param1 = $this->getParameter("param1");
        $param2 = $this->getParameter("param2");

        $menssagem = "Esse é um teste de rota com 2 parametros. Parametro 1 '" . $param1 . "', Parametro 2: '" . $param2 . "'";

        return new Response($menssagem, HttpExceptionConstans::OK_CODE);
    }

    public function testeRotaComParametrosObrigatorios(){
        $param1 = $this->getParameter("param1", [ValidationRules::notEmpty()]);
        $param2 = $this->getParameter("param2", [ValidationRules::length(5, 10)]);

        $menssagem = "Esse é um teste de rota com 2 parametros obrigatorios, sendo o primeiro que não sej vazio, 
                        e o segundo tem que ter caracteres entre 5 e 10 caracteres. Parametro 1 '" . $param1 . "', Parametro 2: '" . $param2 . "'";

        return new Response($menssagem, HttpExceptionConstans::OK_CODE);
    }

    public function testeRotaComDto(){
        $param1 = $this->getParameter("param1");
        $param2 = $this->getParameter("param2");

        $retornoDto = $this->service->getRetornoComDto($param1, $param2);

        return new Response($retornoDto, HttpExceptionConstans::OK_CODE);
    }

    public function testeRotaComException(){

        throw new TesteRotaComException();

        return new Response("Vazio", HttpExceptionConstans::OK_CODE);
    }

}