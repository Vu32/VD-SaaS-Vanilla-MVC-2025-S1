<?php
/**
 * Validation Class
 *
 * The code to validate string values
 *
 * Filename:        Validation.php
 * Location:        Framework/
 * Project:         VD-SaaS-Vanilla-MVC-2025-S1
 * Date Created:    21/03/2025
 *
 * Author:          Vu Do J241918@tafe.wa.edu.au
 *
 */

namespace Framework;

class Validation
{
    /**
     *
     * Validate the string
     *
     * @param $value
     * @param $min
     * @param $max
     * @return bool
     */
    public static function string($value, $min = 1, $max = INF)
    {
        if (is_string($value)) {
            $value = trim($value);
            $length = strlen($value);
            return $length >= $min && $length <= $max;
        }

        return false;
    }

    /**
     * Validates the email structure
     *
     * @param $value
     * @return mixed
     */
    public static function email($value)
    {
        $value = trim($value);

        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    /**
     *
     * Validates and matches the values
     *
     * @param $value1
     * @param $value2
     * @return bool
     */

    public static function match($value1, $value2)
    {
        $value1 = trim($value1);
        $value = trim($value2);

        return $value1 === $value2;
    }

}