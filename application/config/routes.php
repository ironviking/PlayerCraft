<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "site";
$route['admin'] = "admin";
$route['admin/misc'] = "admin/misc";
$route['admin/edit/(:any)'] = "admin/edit/$1";
$route['admin/EditWidget/(:num)'] = "admin/EditWidget/$1";
$route['admin/widgets'] = "admin/widgets";
$route['install'] = "admin/install";
$route['login'] = "site/login";
$route['admin/login'] = "site/login";
$route['(:any)'] = "site/index/$1";
$route['404_override'] = '';
