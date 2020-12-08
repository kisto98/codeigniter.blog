<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['posts/index'] = 'posts/index';
$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/allposts']='posts/allposts';
$route['posts/(:any)']='posts/view/$1';
$route['posts'] = 'posts/index';
$route['default_controller'] = 'users/login';
$route['(:any)']='pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;