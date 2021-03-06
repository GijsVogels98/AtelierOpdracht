<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['blog'] = 'autoload/index';

$route['producten/nieuw'] = 'products/create';
$route['producten/update'] = 'products/update';
$route['producten/(:any)'] = 'products/view/$1';
$route['producten/bewerken/(:any)'] = 'products/edit/$1';
$route['producten'] = 'products/index';

$route['categorieen'] = 'categories/index';
$route['categorieen/nieuw'] = 'categories/create';
$route['categorieen/producten/(:any)'] = 'categories/posts/$1';

$route['lenen'] = 'borrowed/index';
$route['lenen/ingeleverd'] = 'borrowed/redeemed';
$route['lenen/nieuw'] = 'borrowed/create';
$route['aanvragen'] = 'borrowed/request';
$route['aanvragen/geweigerd'] = 'borrowed/denied_requests';
$route['aanvragen/geaccepteerd'] = 'borrowed/accepted_requests';

$route['login'] = 'users/login';
$route['registreren'] = 'users/register';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
