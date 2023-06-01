<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
$config['full_tag_close']   = '</ul></nav></div>';
$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
$config['num_tag_close']    = '</span></li>';
$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
$config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
$config['prev_tag_close']  = '</span></li>';
$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
$config['first_tag_close'] = '</span></li>';
$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
$config['last_tag_close']  = '</span></li>';