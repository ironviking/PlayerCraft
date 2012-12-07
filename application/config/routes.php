<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "site";
$route['admin'] = "admin";
$route['admin/widgets'] = "admin/widgets";
$route['admin/page/(:any)'] = "admin/edit_page/$1";
$route['admin/widgets/(:num)'] = "admin/edit_widget/$1";
$route['admin/blog'] = "admin/blog_posts";
$route['admin/blog/post/(:num)'] = "admin/edit_post/$1";
$route['admin/login'] = "login";
$route['admin/install'] = "admin/install";
$route['admin/misc'] = "admin/misc";
$route['(:any)'] = "site/index/$1";

$route['404_override'] = '';