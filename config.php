<?php

    /* create database configuration*/
    $database = array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'name' => 'daimatus',
    );

    $url = "http://localhost/daimatus/";

    /* define global path directory for client web*/
    defined ('ROOT_PATH')
      or define('ROOT_PATH', realpath(dirname(__FILE__)));

    defined ('IMAGES_PATH')
      or define('IMAGES_PATH', '/images');

    defined ('LIBRARY_PATH')
      or define('LIBRARY_PATH', realpath(dirname(__FILE__) . '/library'));

    defined ('TEMPLATES_PATH')
      or define('TEMPLATES_PATH', realpath(dirname(__FILE__) . '/templates'));

    /* define global path directory for admin web*/
    defined ('ADMIN_PATH')
      or define('ADMIN_PATH', realpath(dirname(__FILE__) . '/admin'));

    defined ('ADMIN_IMAGES_PATH')
      or define('ADMIN_IMAGES_PATH', '../admin/images');

    defined ('ADMIN_VIDEOS_PATH')
      or define('ADMIN_VIDEOS_PATH', '../admin/videos');

    defined ('ADMIN_TEMPLATES_PATH')
      or define('ADMIN_TEMPLATES_PATH', realpath(dirname(__FILE__) . '/admin/templates'));

    defined ('ADMIN_ACTION_PATH')
      or define('ADMIN_ACTION_PATH', realpath(dirname(__FILE__) . '/admin/action'));

    defined ('ADMIN_MODEL_PATH')
      or define('ADMIN_MODEL_PATH', realpath(dirname(__FILE__) . '/admin/model'));

?>
