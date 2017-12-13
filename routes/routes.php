<?php

// route prototype object  you would make a factory to return this

class route
{
    public $page;
    public $action;
    public $method;
    public $controller;
}

class routes
{

    public static function getRoutes()
    {
        // routes to match URL and request method with controller and method
        
		// FACTORY: http_method, page, action, controller [,method = usually the same as action]
		// 	-HTTP_METHODS
       	$http_methods 	= array('GET', 'POST');
		// 	-PAGE [index.php?page=index; controller name / method called]
		$pages 			= array('homepage', 'tasks', 'accounts', 'login');
		// 	-ACTION
		$actions		= array('all', 'show', 'create', 'edit', 'store', 'delete');
		// 	-CONTROLLER
		// 		$page.'Controller'
		// 	-METHOD
		// 		same as action
		
		foreach ($http_methods as $http) {
			foreach ($pages as $page) {
				foreach ($actions as $action) {
        			$route = new route();
        			$route->http_method = $http;
			        $route->page = $page;
			        $route->action = $action;
			        $route->controller = $page.'Controller';
			        $route->method = $action;

			        $routes[] = $route;
				}
			}
		}

        return $routes;
    }
}