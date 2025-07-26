<?php

namespace App\interface;

interface ResponseRedirectorInterface
{
    public function redirect(string $uri, int $statusCode = 302): void;
}