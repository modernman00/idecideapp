<?php

declare(strict_types=1);

namespace App\routing;

use AltoRouter;

class RouteDispatch
{
    protected ?array $match = null;

    public function dispatch(AltoRouter $router): void
    {
        $this->match = $router->match();

        if (!$this->isMatchValid()) {
            $this->renderError('No matching route found.');
            return;
        }

        [$controllerClass, $method] = explode('@', $this->match['target']);

        if (!class_exists($controllerClass)) {
            $this->renderError("Controller '{$controllerClass}' not found.");
            return;
        }

        $controllerInstance = new $controllerClass();

        if (!method_exists($controllerInstance, $method)) {
            $this->renderError("Method '{$method}' not defined in '{$controllerClass}'.");
            return;
        }

        $this->invoke($controllerInstance, $method, $this->match['params']);
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

    protected function renderError(string $message): void
    {
        view('error', ['message' => $message]);
    }
}
