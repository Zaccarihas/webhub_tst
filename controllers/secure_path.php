<?php

    /** 
     * get_secure_path
     * 
     * Get the path the secure folder
     * 
     * @param $pub  string  The webservers public folder name
     * @param $sec  string  The webservers secure folder name
     * 
     */
    function get_secure_path($pub, $sec) {
        return str_replace($pub,$sec,dirname(__DIR__,1)); // Using __DIR__ to get the current path to the current folder
    }
    