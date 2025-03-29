<?php
/**
 * Home Controller
 *
 *
 *
 * Filename:        HomeController.php
 * Location:        App/controllers
 * Project:         VD-SaaS-Vanilla-MVC-2025-S1
 * Date Created:    28/03/2025
 *
 * Author:          Vu Do J241918@tafe.wa.edu.au
 *
 */

namespace App\controllers;

class HomeController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }
    public function index()
    {
        loadView('home', []);

    }


}