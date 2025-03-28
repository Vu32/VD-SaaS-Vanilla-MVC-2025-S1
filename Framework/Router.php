<?php
/**
 * Router Processing Class
 *
 * Processing incoming requests to the correct destination
 *
 * Filename:        Router.php
 * Location:        Framework/
 * Project:         VD-SaaS-Vanilla-MVC-2025-S1
 * Date Created:    21/03/2025
 *
 * Author:          Vu Do J241918@tafe.wa.edu.au
 *
 */

namespace Framework;

use App\Controllers\ErrorController;
use Framework\Middleware\Authorise;

class Router
{
    protected $routes = [];
    /**
     *
     * Creates a list or array of the registered route
     *
     * @param $method
     * @param $uri
     * @param $action
     * @param $middleware
     * @return void
     */
    public function registerRoute($method, $uri, $action, $middleware = [])
    {
        list($controller, $controllerMethod) = explode('@', $action);

        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod,
            'Middleware' => $middleware
        ];
    }

    /**
     *
     * Using the GET route method as an acceptable registered route along with uri, controller and middleware
     *
     * @param $uri
     * @param $controller
     * @param $middleware
     * @return void
     */
    public function get($uri, $controller, $middleware = [])
    {
        $this->registerRoute('GET', $uri, $controller, $middleware);
    }

    /**
     *
     * Using the POST route method as an acceptable registered route along with uri, controller and middleware
     *
     * @param $uri
     * @param $controller
     * @param $middleware
     * @return void
     */
    public function post($uri, $controller, $middleware = [])
    {
        $this->registerRoute('POST', $uri, $controller, $middleware);
    }

    /**
     *
     * Using the PUT route method as an acceptable registered route along with uri, controller and middleware
     *
     * @param $uri
     * @param $controller
     * @param $middleware
     * @return void
     */
    public function put($uri, $controller, $middleware = [])
    {
        $this->registerRoute('PUT', $uri, $controller, $middleware);
    }

    /**
     *
     * Using the DELETE route method as an acceptable registered route along with uri, controller and middleware
     *
     * @param $uri
     * @param $controller
     * @param $middleware
     * @return void
     */

    public function delete($uri, $controller, $middleware = [])
    {
        $this->registerRoute('DELETE', $uri, $controller, $middleware);
    }

    /**
     *
     * Complicated routing method using complex routing code to create an Authorise Class
     *
     * @param $uri
     * @return void
     */
    public function route($uri)
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        // Check for _method input
        if ($requestMethod === 'POST' && isset($_POST['_method'])) {
            // Override the request method with the value of _method
            $requestMethod = strtoupper($_POST['_method']);
        }

        foreach ($this->routes as $route) {

            // Split the current URI into segments
            $uriSegments = explode('/', trim($uri, '/'));

            // Split the route URI into segments
            $routeSegments = explode('/', trim($route['uri'], '/'));

            $match = true;

            // Check if the number of segments matches
            if (count($uriSegments) === count($routeSegments) && strtoupper($route['method'] === $requestMethod)) {
                $params = [];

                $match = true;
                $segments = count($uriSegments);
                for ($i = 0; $i < $segments; $i++) {
                    // If the uri's do not match and there is no param
                    if ($routeSegments[$i] !== $uriSegments[$i] && !preg_match('/\{(.+?)}/', $routeSegments[$i])) {
                        $match = false;
                        break;
                    }

                    // Check for the param and add to $params array
                    if (preg_match('/\{(.+?)}/', $routeSegments[$i], $matches)) {
                        $params[$matches[1]] = $uriSegments[$i];
                    }
                }

                if ($match) {
                    foreach ($route['Middleware'] as $middleware) {
                        (new Authorise())->handle($middleware);
                    }

                    $controller = 'App\\Controllers\\' . $route['controller'];
                    $controllerMethod = $route['controllerMethod'];

                    // Instantiate the controller and call the method
                    $controllerInstance = new $controller();
                    $controllerInstance->$controllerMethod($params);
                    return;
                }
            }
        }
        ErrorController::notFound();
    }

}