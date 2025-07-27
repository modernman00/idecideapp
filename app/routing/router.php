<?php

declare(strict_types=1);

$router = new AltoRouter();

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

// managed page / login page

$router->map('GET', '/managed', 'App\controller\LoginController@show', 'managed');

$router->map('POST', '/managed', 'App\controller\LoginController@login', 'managed_post');

$router->map('GET', '/forgot', 'App\controller\ForgotController@show', 'forgot');

$router->map('POST', '/forgot', 'App\controller\ForgotController@post', 'forgot_post');

// LOG OUT PAGE
$router->map('GET', '/signout/[a:redirect]', 'App\controller\LogoutController@signout', 'signout');

// password change
$router->map('GET', '/passwordChange', 'App\controller\PasswordChangeController@show', 'passwordChange');

$router->map('POST', '/passwordChange', 'App\controller\PasswordChangeController@post', 'passwordChange_post');

// GET ALLL BLOG IN A BLOG TABLE

$router->map(
    'GET',
    '/blogMgt',
    'App\controller\BlogController@blogMgt',
    'blogMgt'
);

// edit blog post
$router->map('GET', '/editBlog/[i:id]', 'App\controller\BlogController@showEditForm', 'editBlog');

// update blog post
$router->map('POST', '/editBlog/[i:id]', 'App\controller\BlogController@edit', 'editBlog_post');

// delete blog post
$router->map('GET', '/deleteBlog/[i:id]', 'App\controller\BlogController@delete', 'deleteBlog');

// Handle 404 Not Found
$router->map('GET', '/404', 'App\controller\ErrorController@notFound', 'not_found');

// Handle 500 Not Found
$router->map('GET', '/500', 'App\controller\ErrorController@internalServerError', 'server_error');
