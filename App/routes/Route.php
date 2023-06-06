<?php
namespace routes;

use teste_module\TesteAction;

Class Route
{
    private $routes;

    private function get(string $uri, $handler)
    {
        $this->routes[$uri]['GET'] = $handler;
    }

    private function post(string $uri, $handler)
    {
        $this->routes[$uri]['POST'] = $handler;
    }

    private function put(string $uri, $handler)
    {
        $this->routes[$uri]['PUT'] = $handler;
    }

    private function delete(string $uri, $handler)
    {
        $this->routes[$uri]['DELETE'] = $handler;
    }

    public function getAllRoutes(){
        $this->addGetRoutes();
        $this->addPostRoutes();
        $this->addDeleteRoutes();
        $this->addPutRoutes();

        return $this->routes;
    }

    private function addGetRoutes(){
       $this->get('/testeRota', [TesteAction::class, 'testeRota']);
    }

    private function addPostRoutes(){
        $this->post('/testeRotaComParametros', [TesteAction::class, 'testeRotaComParametros']);
        $this->post('/testeRotaComParametrosObrigatorios', [TesteAction::class, 'testeRotaComParametrosObrigatorios']);
        $this->post('/testeRotaComDto', [TesteAction::class, 'testeRotaComDto']);
        $this->post('/testeRotaComException', [TesteAction::class, 'testeRotaComException']);
    }

    private function addDeleteRoutes(){
    }

    private function addPutRoutes(){
    }



}