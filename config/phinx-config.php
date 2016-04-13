<?php
/**
 * --------------------------------------
 *       MIGRATIONS CONFIGURATION
 * --------------------------------------
 */
require 'bootstrap.php';

return [
    'paths' => [
        'migrations' => 'database/migrations',
        'seeds' => 'database/seeds',
    ],
    'migration_base_class' => '\Pecee\DB\Migration',
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_database' => 'dev',
        'dev' => [
            'adapter' => env('DB_DRIVER', 'mysql'),
            'host' => env('DB_HOST'),
            'name' => env('DB_DATABASE'),
            'user' => env('DB_USERNAME'),
            'pass' => env('DB_PASSWORD'),
            'port' => env('DB_PORT', 3306)
        ]
    ]
];