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
$route['user/update_password'] = 'users/updatePassword';