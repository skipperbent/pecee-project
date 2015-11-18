<?php
use Pecee\DB\Pdo;
use Pecee\Locale;
$key = \Pecee\Registry::getInstance();
$site = \Pecee\UI\Site::getInstance();
/* ---------- Configuration start ---------- */

// Debug mode enabled
$site->setDebug(env('DEBUG'));

/* Database */
$key->set(Pdo::SETTINGS_CONNECTION_STRING, 'mysql:host='.env('DB_HOST').';dbname='.env('DB_NAME').';charset=utf8');
$key->set(Pdo::SETTINGS_USERNAME, env('DB_USER'));
$key->set(Pdo::SETTINGS_PASSWORD, env('DB_PASS'));

/* Site main language */
Locale::getInstance()->setLocale('da-DK');
Locale::getInstance()->setDefaultLocale('da-DK');

// Add IP's that are allowed to debug, clear-cache etc.
$site->addAdminIp('127.0.0.1');
$site->addAdminIp('::1');
/* ---------- Configuration end ---------- */
