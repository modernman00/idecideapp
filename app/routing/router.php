<?php

$router = new AltoRouter;

$router->map('GET', '/', 'App\controller\IndexController@main', 'home');

// $router->map('GET', '/questions', 'App\controller\Index@questions', 'questions');

$router->map('GET', '/result', 'App\controller\IndexController@result', 'result');

$router->map('GET', '/terms', 'App\controller\IndexController@terms', 'terms');

$router->map('GET', '/privacy', 'App\controller\IndexController@privacy', 'privacy');

$router->map('GET', '/contact', 'App\controller\IndexController@contact', 'contact');

$router->map('GET', '/about', 'App\controller\IndexController@about', 'about');

$router->map('GET', '/blogs', 'App\controller\IndexController@blogs', 'blogs');

// email result
$router->map('POST', '/emailResult', 'App\controller\EmailResultController@emailResult', 'email_result');

// CALCULATE RESULT 

$router->map('POST', '/calculateResult', 'App\controller\CalculateResultController@process', 'calculateResult');








