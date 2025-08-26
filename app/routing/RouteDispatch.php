<?php

declare(strict_types=1);

namespace App\routing;

use AltoRouter;
use Src\Utility;

class RouteDispatch
{
    protected ?array $match = null;

    public function dispatch(AltoRouter $router): void
    {

        // include in the try and catch block 
        try {
            if($router->match() === false) {
                $this->renderError();
               throw new \Exception('No matching route found');
            }
            $this->match = $router->match();

       
        if (!$this->isMatchValid()) {
            $this->renderError();
            throw new \Exception('No matching route found');
        }

        [$controllerClass, $method] = explode('@', $this->match['target']);

        if (!class_exists($controllerClass)) {
            $this->renderError();
            throw new \Exception('No controller class found');
        }

        $controllerInstance = new $controllerClass();

        if (!method_exists($controllerInstance, $method)) {
            $this->renderError();
            throw new \Exception('No matching method found');
        }

        $this->invoke($controllerInstance, $method, $this->match['params']);
        } catch (\Exception $e) {
         
            return;
        }


    }

    protected function isMatchValid(): bool
    {
        return is_array($this->match)
            && isset($this->match['target'])
            && strpos($this->match['target'], '@') !== false;
    }

    protected function invoke(object $controllerInstance, string $method, array $params): void
    {
        call_user_func_array([$controllerInstance, $method], [$params]);
    }

    protected function renderError(): void
    {
        view('errors/404');
    }
}
