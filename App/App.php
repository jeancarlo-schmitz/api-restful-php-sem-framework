<?php

use routes\Router;
use routes\Route;
use system\ExceptionHandler;

class App
{
    private $router;
    private $exceptionHandler;

    public function __construct()
    {
        $route = new Route();
        $routes = $route->getAllRoutes();

        $this->router = new Router($routes);
        $this->exceptionHandler = new ExceptionHandler();

        if (!IS_DEV) {
            set_error_handler([$this->exceptionHandler, 'customErrorHandler']);
            register_shutdown_function([$this->exceptionHandler, 'handleFatalError']);
        }
    }

    public function handleRequest()
    {
        try {
            $response = $this->router->dispatch();
            $response->send();
        } catch (Exception $e) {
            $response = $this->exceptionHandler->handle($e);
            $response->send();
        }
    }
}