<?php

namespace routes;

use http\Request;
use Exception;
use core\exceptions\MethodNotAllowedException;
use core\exceptions\NotFoundException;
use utils\Sanitizer;

class Router
{
    protected $routes = [];

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    public function dispatch()
    {
        $sanitize = new Sanitizer();
        $request = new Request($sanitize);

        $uri    = $request->getUri();
        $method = $request->getMethod();

        if($this->isRouteNotRegistered($method, $uri)){
            $this->handleMethodNotAllowed();
        }

        if (isset($this->routes[$uri])) {
            foreach ($this->routes[$uri] as $routeMethod => $handler) {
                if ($this->matchMethod($method, $routeMethod)) {
                    return $this->handle($handler, $request);
                }
            }
        }

        throw new NotFoundException();
    }

    private function isRouteNotRegistered($method, $uri)
    {

        return !isset($this->routes[$uri][$method]) && isset($this->routes[$uri]);
    }

    private function handleMethodNotAllowed(){
        throw new MethodNotAllowedException();
    }

    private function matchMethod(string $method, string $routeMethod): bool{
        return $method === $routeMethod;
    }

    private function matchPath(string $path, string $routePath): bool
    {
        $pattern = preg_replace('/\//', '\\/', $routePath);
        $pattern = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-zA-Z0-9-]+)', $pattern);
        $pattern = '/^' . $pattern . '$/';

        return preg_match($pattern, $path, $matches) === 1;
    }

    private function handle($handler, $request)
    {

        [$className, $methodName] = $handler;

        if (class_exists($className)) {
            $classInstance = new $className($request);

            if (method_exists($classInstance, $methodName)) {
                return $classInstance->$methodName();
            }
        }

        throw new Exception("Problema pra lidar com a rota", 1000);
    }
}
