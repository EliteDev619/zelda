<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'dashboard';
$route['404_override'] = 'errors/error404';
$route['translate_uri_dashes'] = FALSE;

// Application Routes -------------------------------------
// Application Login
$route['auth'] = 'auth';
$route['auth/login'] = 'auth/login';
$route['auth/register'] = 'auth/register';
$route['logout'] = 'auth/logout';

// Application Profile
$route['profile'] = 'profile';

// Application User
$route['users'] = 'users';
$route['users/add'] = 'users/add';
$route['users/save'] = 'users/save';
$route['users/update_password'] = 'users/update_password';
$route['users/update_membership/(:number)'] = 'users/update_membership/$1';
$route['users/edit/(:number)'] = 'users/edit/$1';
$route['users/update/(:number)'] = 'users/update/$1';
$route['users/delete/(:number)'] = 'users/delete/$1';

// Application Admin
$route['admin'] = 'events';

// Application Event
$route['events'] = 'events';
$route['events/add'] = 'events/add';
$route['events/save'] = 'events/save';
$route['events/edit/(:number)'] = 'events/edit/$1';
$route['events/update/(:number)'] = 'events/update/$1';
$route['events/delete/(:number)'] = 'events/delete/$1';

// Application Bet
$route['dashboard/add/(:number)'] = 'dashboard/add/$1';

// Application Market
$route['market'] = 'market';

