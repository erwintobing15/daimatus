<?php

    /* create database configuration*/
    $database = array(
        'host' => 'root',
        'username' => 'localhost',
        'password' => '',
        'name' => 'daimatus',
    );

    /* define global path directory for client web*/
    defined ('IMAGES_PATH')
      or define('IMAGES_PATH', '/images');

    defined ('LIBRARY_PATH')
      or define('LIBRARY_PATH', realpath(dirname(__FILE__) . '/library'));

    defined ('TEMPLATES_PATH')
      or define('TEMPLATES_PATH', realpath(dirname(__FILE__) . '/templates'));

    /* define global path directory for admin web*/
    defined ('ADMIN_IMAGES_PATH')
      or define('ADMIN_IMAGES_PATH', '../admin/images');

    defined ('ADMIN_TEMPLATES_PATH')
      or define('ADMIN_TEMPLATES_PATH', realpath(dirname(__FILE__) . '/admin/templates'));




?>
