<?php

    /* create database configuration*/
    $database = array(
        'host' => 'root',
        'username' => 'localhost',
        'password' => '',
        'name' => 'daimatus',
    );

    /* define global path directory */
    defined ('IMAGES_PATH')
        or define('IMAGES_PATH', realpath(dirname(__FILE__) . '/images'));

    defined ('LIBRARY_PATH')
        or define('LIBRARY_PATH', realpath(dirname(__FILE__) . '/library'));

    defined ('TEMPLATES_PATH')
        or define('TEMPLATES_PATH', realpath(dirname(__FILE__) . '/templates'));

        


?>