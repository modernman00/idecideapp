<?php

$router = new AltoRouter;

$router->map('GET', '/', 'App\controller\IndexController@main', 'home');

// $router->map('GET', '/questions', 'App\controller\Index@questions', 'questions');

$router->map('GET', '/result', 'App\controller\IndexController@result', 'result');

$router->map('GET', '/terms', 'App\controller\IndexController@terms', 'terms');

$router->map('GET', '/privacy', 'App\controller\IndexController@privacy', 'privacy');

$router->map('GET', '/contact', 'App\controller\IndexController@contact', 'contact');

$router->map('GET', '/about', 'App\controller\IndexController@about', 'about');

$router->map('GET', '/blogs[a:id]', 'App\controller\IndexController@blogs', 'blogsid');

$router->map('GET', '/blogs', 'App\controller\IndexController@blogs', 'blogs');

// email result
$router->map('POST', '/emailResult', 'App\controller\EmailResultController@emailResult', 'email_result');

// CALCULATE RESULT 

$router->map('POST', '/calculateResult', 'App\controller\CalculateResultController@process', 'calculateResult');

// Show form to create a new blog post
$router->map('GET', '/createBlog', 'App\controller\BlogController@show');

// Create a new blog post
$router->map('POST', '/createBlog', 'App\controller\BlogController@post');

// Show form to edit an existing blog post
$router->map('GET', '/showEditBlog/{id}', 'App\controller\BlogController@showEditForm');

// Update an existing blog post
$router->map('POST', '/showEditBlog/{id}', 'App\controller\BlogController@edit');

// Delete a blog post
$router->map('POST', 'deleteBlog/{id}', 'App\controller\BlogController@delete');

// Content Security Policy Report
$router->map('POST', '/csp-report-log', 'App\controller\ProcessCSReportController@handle', 'csp-report-log');

$router->map('GET', '/csp', 'App\controller\ProcessCSReportController@show', 'csp');



