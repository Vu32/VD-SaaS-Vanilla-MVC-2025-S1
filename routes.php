<?php
/**
 * Creating a route code
 *
 * Filename:        routes.php
 * Location:        /
 * Project:         VD-SaaS-Vanilla-MVC-2025-S1
 * Date Created:    21/03/2025
 *
 * Author:          Vu Do J241918@tafe.wa.edu.au
 *
 */

$router->get('/', 'HomeController@index');

$router->get('/auth/register', 'UserController@create', ['guest']);
$router->get('/auth/login', 'UserController@login', ['guest']);

$router->post('/auth/register', 'UserController@store', ['guest']);
$router->post('/auth/logout', 'UserController@logout', ['auth']);
$router->post('/auth/login', 'UserController@authenticate', ['guest']);