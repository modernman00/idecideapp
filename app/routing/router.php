<?php

declare(strict_types=1);

$router = new AltoRouter();

$router->map('GET', '/', 'App\controller\IndexController@main', 'home');

// $router->map('GET', '/questions', 'App\controller\Index@questions', 'questions');

$router->map('GET', '/result', 'App\controller\IndexController@result', 'result');

$router->map('GET', '/terms', 'App\controller\IndexController@terms', 'terms');

$router->map('GET', '/privacy', 'App\controller\IndexController@privacy', 'privacy');


$router->map('GET', '/about', 'App\controller\IndexController@about', 'about');

$router->map('GET', '/blogs[a:id]', 'App\controller\IndexController@blogs', 'blogsid');

$router->map('GET', '/blogs', 'App\controller\IndexController@blogs', 'blogs');

// email result
$router->map('POST', '/emailResult', 'App\controller\EmailResultController@emailResult', 'email_result');

// CALCULATE RESULT

$router->map('POST', '/calculateResult', 'App\controller\CalculateResultController@process', 'calculateResult');

// BLOG MANAGEMENT

// Show form to create a new blog post
$router->map('GET', '/createBlog', 'App\controller\BlogController@showCreateBlog', 'showCreateBlog');

// Create a new blog post
$router->map('POST', '/createBlog', 'App\controller\BlogController@postCreateBlog', 'postCreateBlog');

// Show form to edit an existing blog post
$router->map('GET', '/showEditBlog/{id}', 'App\controller\BlogController@showEditForm');

// Update an existing blog post
$router->map('POST', '/showEditBlog/{id}', 'App\controller\BlogController@edit');

// Delete a blog post
$router->map('POST', 'deleteBlog/{id}', 'App\controller\BlogController@delete');

// Content Security Policy Report
$router->map('POST', '/csp-report-log', 'App\controller\ProcessCSReportController@handle', 'csp-report-log');

$router->map('GET', '/csp', 'App\controller\ProcessCSReportController@show', 'csp');


// LOG OUT PAGE
$router->map('GET', '/signout/[a:redirect]', 'App\controller\LogoutController@signout', 'signout');



// $router->map(
//     'GET',
//     '/blogMgt',
//     'App\controller\BlogController@blogMgt',
//     'blogMgt'
// );

// edit blog post
$router->map('GET', '/editBlog/[i:id]', 'App\controller\BlogController@showEditForm', 'editBlog');

// update blog post
$router->map('POST', '/editBlog/[i:id]', 'App\controller\BlogController@postEditForm', 'editBlog_post');

// delete blog post
$router->map('GET', '/deleteBlog/[i:id]', 'App\controller\BlogController@delete', 'deleteBlog');


// ADMIN LOGIN SHOW

$router->map('GET', '/adminlogin', 'App\controller\AcctMgtController@loginShow', 'adminlogin');

// ADMIN LOGIN POST

$router->map('POST', '/adminlogin', 'App\controller\AcctMgtController@loginPost', 'adminloginpost');

// ADMIN  HOME PAGE
$router->map('GET', '/adminhome', 'App\controller\AcctMgtController@adminPage', 'adminhome');

// Forgot
$router->map('GET', '/forgot', 'App\controller\AcctMgtController@showForgot', 'Forgot');

// FORGOT_POST
$router->map('POST', '/forgot', 'App\controller\AcctMgtController@postForgot', 'ForgotPost');

// CODE
$router->map('GET', '/code', 'App\controller\AcctMgtController@showCode', 'code');

// CODE_POST
$router->map('POST', '/code', 'App\controller\AcctMgtController@postCode', 'codePost');

// RESET
$router->map('GET', '/changePassword', 'App\controller\AcctMgtController@showChangePassword', 'changePassword');

// changePassword_POST
$router->map('POST', '/changePassword', 'App\controller\AcctMgtController@postChangePassword', 'changePasswordPost');


$router->map('GET', '/error401', 'App\controller\ErrorReportingController@unauthorized401', 'error401');
$router->map('GET', '/error403', 'App\controller\ErrorReportingController@forbidden403', 'error403');
$router->map('GET', '/error404', 'App\controller\ErrorReportingController@notFound404', 'error404');
$router->map('GET', '/error429', 'App\controller\ErrorReportingController@tooManyRequests429', 'error429');
$router->map('GET', '/error500', 'App\controller\ErrorReportingController@serverError500', 'error500');

// testPOST 
$router->map('POST', '/testPost', 'App\controller\IndexController@testPost', 'testPost');

// testGET
$router->map('GET', '/testPost', 'App\controller\IndexController@testGet', 'testGet');

// contact 
$router->map('POST', '/contact', 'App\controller\IndexController@postContact', 'postContact');

// contact 
$router->map('GET', '/contact', 'App\controller\IndexController@contact', 'showContact');




