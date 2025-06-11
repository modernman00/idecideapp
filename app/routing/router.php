<?php

$router = new AltoRouter;

$router->map('GET', '/', 'App\controller\Index@main', 'home');

// $router->map('GET', '/questions', 'App\controller\Index@questions', 'questions');

$router->map('GET', '/result', 'App\controller\Index@result', 'result');

$router->map('GET', '/terms', 'App\controller\Index@terms', 'terms');

$router->map('GET', '/privacy', 'App\controller\Index@privacy', 'privacy');

$router->map('GET', '/contact', 'App\controller\Index@contact', 'contact');

$router->map('GET', '/about', 'App\controller\Index@about', 'about');

$router->map('GET', '/blogs', 'App\controller\Index@blogs', 'blogs');




