<?php

/* ---------- Configuration start ---------- */

// Example usage: Registry
// $key = \Pecee\Registry::getInstance();
// $key->set('StuffToSave', 'ValueToRetrieve');

app()->translation->setProvider(new \Pecee\Translation\Providers\XmlTranslateProvider());
app()->setDefaultLocale('en_gb');
app()->setLocale('en_gb');
app()->setTimezone('UTC');
app()->setAdminIps([
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
