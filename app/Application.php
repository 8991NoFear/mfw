<?php
namespace App;

class Application {
    public function handle() {
        $this->middleware();
    }

    /**
     * middleware for pre-processing request
     */
    private function middleware() {
        // validate request
        $this->validateOrFail();

        // route request
        $this->routeOrFail();
    }

    private function validateOrFail() {
        return;
    }

    private function routeOrFail() {
        $routes = Router::ROUTES;
        foreach ($routes as $url => $action) {
            // See if the route matches the current request
            $matches = preg_match($url, $_SERVER['REQUEST_URI'], $params);

            // If it matches...
            if ($matches > 0) {
                // Run that action, passing the parameters and then finish the loop
                $ctr = "Src\\Controller\\$action[0]";
                $controller = new $ctr;
                if (!empty($params)) {
                    $controller->{$action[1]}($params);
                } else {
                    $controller->{$action[1]}();
                }
                return;
            }
        }
        // fail
        Controller::abort();
    }
}