<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['producten/nieuw'] = 'products/create';
$route['producten/(:any)'] = 'products/view/$1';
$route['producten'] = 'products/index';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
