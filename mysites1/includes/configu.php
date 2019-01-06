<?php
    /*define('ROOT_DIR', rtrim(__DIR__, '/includes') . '/');
    define('ROOT_URL', '//' . $_SERVER['HTTP_HOST'] . str_replace($_SERVER['DOCUMENT_ROOT'], '', rtrim(__DIR__, '/includes')) . '/');
    define('IS_DEBUG', true);

    if (IS_DEBUG) {
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        ini_set('track_errors', 1);
        error_reporting(E_ALL | E_STRICT);
        set_time_limit(0);
        define('__DIR', __DIR__);
        define('__FILE', __FILE__);
    }*/

    $config = array(
        'title' => 'poiskmam',
        'db' => array(
            'server' => 'localhost',
            'username' => 'root',
            'password' => '',
            'name' => 'poiskmam',
        )
    );

    require "db.php";
