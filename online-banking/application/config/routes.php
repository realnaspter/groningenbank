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

$route['login'] = 'home/login';
$route['dashboard'] = 'home/dashboard';
$route['create'] = 'home/create';
$route['docreate'] = 'home/docreate';
$route['check'] = 'home/check';
$route['logout'] = 'home/logout';
$route['forgot'] = 'home/forgot';
$route['transactions'] = 'home/transactions';
$route['transactions/(:num)'] = 'home/transactions';
$route['account'] = 'home/account';
$route['transfer'] = 'home/transfer';
$route['card'] = 'home/card';
$route['profile'] = 'home/profile';
$route['password'] = 'home/password';
$route['dochange'] = 'home/dochange';
$route['doprofile'] = 'home/doprofile';
$route['activate/(:any)/(:any)'] = 'home/doactivate';
$route['close'] = 'home/close';
$route['doforgot'] = 'home/doforgot';
$route['reset/(:any)/(:any)'] = 'home/doreset';
$route['testpassword'] = 'home/testpassword';
$route['doresetpass'] = 'home/doresetpass';
$route['operation'] = 'home/operation';
$route['dooperation'] = 'home/dooperation';
$route['dotransfer'] = 'home/dotransfer';
$route['customers'] = 'home/customers';
$route['customers/(:num)'] = 'home/customers';
$route['doaction'] = 'home/doaction_customer';
$route['customers/doaction'] = 'home/doaction_customer';

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
