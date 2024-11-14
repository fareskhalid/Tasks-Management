<?php
    
    namespace TaskManagementSystem\Core;
    
    class Router
    {
        private array $routes = [];
        
        public function get(string $path, string $controller, string $action)
        {
            $this->add('get', $path, $controller, $action);
        }
        
        
        public function post(string $path, string $controller, string $action)
        {
            $this->add('post', $path, $controller, $action);
        }
        
        
        private function add(string $method, string $path, string $controller, string $action)
        {
            $this->routes[$method][$path] = [
                $controller,
                $action,
            ];
        }
        
        public function resolve()
        {
            $request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $request_method = strtolower($_SERVER['REQUEST_METHOD']);
            
            // Check if the route is not found
            if (!isset($this->routes[$request_method][$request_uri])) {
                $this->abort(404, 'Route Not Found');
            }
            
            [$controller, $method] = $this->routes[$request_method][$request_uri];
            
            if (class_exists($controller)) {
                $controllerClass = new $controller();
                
                if (method_exists($controllerClass, $method)) {
                    $controllerClass->$method();
                    return;
                }
            }
            
            // If the class not exist or the method not exist abort
            $this->abort(500, "Internal Server Error");
        }
        
        private function abort(int $response_code, string $message): never
        {
            http_response_code($response_code);
            echo $message;
            exit;
        }
    }
