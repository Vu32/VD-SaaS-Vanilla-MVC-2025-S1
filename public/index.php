<?php
/**
 * FILE TITLE GOES HERE
 *
 * DESCRIPTION OF THE PURPOSE AND USE OF THE CODE
 * MAY BE MORE THAN ONE LINE LONG
 * KEEP LINE LENGTH TO NO MORE THAN 96 CHARACTERS
 *
 * Filename:        index.php
 * Location:        
 * Project:         VD-SaaS-Vanilla-MVC-2025-S1
 * Date Created:    28/03/2025
 *
 * Author:          Vu Do J241918@tafe.wa.edu.au
 *
 */
require __DIR__ . '/../vendor/autoload.php';

use Framework\Router;
use Framework\Session;

Session::start();

require __DIR__.'/../helpers.php';

// Instantiate the router
$router = new Router();

// Get routes
$routes = require basePath('routes.php');

// Get current URI and HTTP method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//echo password_hash("Password1",PASSWORD_DEFAULT);
//die;
// Route the request
$router->route($uri);