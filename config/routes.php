<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['users/login'] = 'users/login';
$route['users/logout'] = 'users/logout';
$route['users/register'] = 'users/register';
$route['users/update'] = 'users/update';
$route['users/(:any)'] = 'users/view/$1';
$route['users'] = 'users/index';

$route['posts/index'] = 'posts/index';
$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';

$route['default_controller'] = 'pages/view';

$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
$route['categories/posts/(:any)'] = 'categories/posts/$1';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;