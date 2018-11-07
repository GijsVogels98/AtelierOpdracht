<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['producten/nieuw'] = 'products/create';
$route['producten/(:any)'] = 'products/view/$1';
$route['producten'] = 'products/index';

$route['categorieen'] = 'categories/index';
$route['categorieen/nieuw'] = 'categories/create';
$route['categorieen/producten/(:any)'] = 'categories/posts/$1';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
