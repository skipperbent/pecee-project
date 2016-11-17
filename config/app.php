<?php

/* ---------- Configuration start ---------- */

// Example usage: Registry
// $key = \Pecee\Registry::getInstance();
// $key->set('StuffToSave', 'ValueToRetrieve');

request()->locale->setTimezone('UTC');
request()->translation->setProvider(new \Pecee\Translation\Providers\XmlTranslateProvider());
request()->site->setAdminIps([
    '127.0.0.1',
]);


// ---- DATABASE SETTINGS ----

if(env('DB_DRIVER') !== null) {

    $app['db'] = array(
        'driver' => env('DB_DRIVER'),
        'host' => env('DB_HOST'),
        'database' => env('DB_DATABASE'),
        'username' => env('DB_USERNAME'),
        'password' => env('DB_PASSWORD'),
        'charset' => 'utf8mb4', // Optional
        'collation' => 'utf8mb4_unicode_ci', // Optional
        'prefix' => '', // Table prefix, optional
    );

}

/* ---------- Configuration end ---------- */
