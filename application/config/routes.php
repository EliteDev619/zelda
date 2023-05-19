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
$route['user/add'] = 'user/add';
$route['user/update_password'] = 'users/updatePassword';

// Application Admin
$route['admin'] = 'admin';

// Application Event
$route['events/add'] = 'events/add';
$route['events/update'] = 'events/update';
$route['events/delete/(:number)'] = 'events/delete/$1';

