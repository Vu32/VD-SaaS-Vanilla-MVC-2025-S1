<?php
/**
 * Authorise class
 *
 * Allows code to authorise genuine users.
 *
 * Filename:        Authorise.php
 * Location:        Framework/middleware/
 * Project:         VD-SaaS-Vanilla-MVC-2025-S1
 * Date Created:    21/03/2025
 *
 * Author:          Vu Do J241918@tafe.wa.edu.au
 *
 */

namespace Framework\middleware;

class Authorise
{
    /**
     * Does user have a key
     *
     * @return mixed
     */
    public function isAuthenticated()
    {
        return Session::has('user');
    }

    /**
     * If user is real, user is allowed to use resources in the websites.
     *
     * If user is not real, it would allow the website to be directed to the login page.
     * @param $role
     * @return void|null
     */

    public function handle($role)
    {
        if ($role === 'guest' && $this->isAuthenticated()) {
            return redirect('/');
        }

        if ($role === 'auth' && !$this->isAuthenticated()) {
            return redirect('/auth/login');
        }
    }

}