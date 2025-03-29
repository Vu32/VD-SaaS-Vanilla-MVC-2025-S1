<?php
/**
 * Error Controller
 *
 *
 * Filename:        ErrorController.php
 * Location:        App/controllers
 * Project:         VD-SaaS-Vanilla-MVC-2025-S1
 * Date Created:    28/03/2025
 *
 * Author:          Vu Do J241918@tafe.wa.edu.au
 *
 */

namespace App\controllers;

class ErrorController
{
    /**
     *
     * 404 Error Message
     *
     * @param $message
     * @return void
     */
    public static function notFound($message = 'Resource not found')
    {
        http_response_code(404);

        loadView('error', [
            'status' => '404',
            'message' => $message
        ]);
    }

    /**
     *
     * 403 Error Message
     *
     * @param $message
     * @return void
     */

    public static function unauthorized($message = 'You are not authorized to view this resource')
    {
        http_response_code(403);

        loadView('error', [
            'status' => '403',
            'message' => $message
        ]);
    }

}