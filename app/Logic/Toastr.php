<?php

namespace App\Logic;
/**
 *  This class is used with toastr js plugin to present popup messages/alerts.
 *  For each message 2 session variables are flashed:
 *  1) the METHOD_KEY which represents the method to be used with (i.e. success, error)
 *  2) the MSG_KEY which represents the actual message to be shown
 *
 *  For the implementation of any new Toastr type/method, a new static method with the equivalent
 *  name must be coded that will make use of the private set method.
 */
class Toastr
{
    /**
     *  the session key for the message to be shown
     */
    const MSG_KEY = 'toastr_msg';

    /**
     *  the session key for the method to be used by toastr(i.e. success,error)
     */
    const METHOD_KEY = 'toastr_method';

    /**
     * Show a success toastr with the given message
     * @param string $msg the message to be shown
     */
    public static function success(string $msg): void
    {
        self::set('success', $msg);
    }

    /**
     * Show an error toastr with the given message
     * @param string $msg the message to be shown
     */
    public static function error(string $msg): void
    {
        self::set('error', $msg);
    }

    /**
     * This actualy creates the session variables.
     *
     * @param $method the method to be used (suucess, error)
     * @param $msg the message to be shown
     */
    private static function set($method,$msg): void
    {
        session()->flash(self::METHOD_KEY,$method);
        session()->flash(self::MSG_KEY,$msg);
    }
}
