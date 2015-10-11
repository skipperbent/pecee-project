<?php
$key = \Pecee\Registry::GetInstance();
$site = \Pecee\UI\Site::GetInstance();
/* ---------- Configuration start ---------- */

// Your custom namespace
$key->set('AppName', 'Demo');

// Debug mode enabled
$site->setDebug(TRUE);

/* Database */
$key->set('DBUsername', 'root');
$key->set('DBPassword', '123456');
$key->set('DBHost', '127.0.0.1');
$key->set('DBDatabase', 'City2');

/* Site main language */
\Pecee\Locale::GetInstance()->setLocale('da-DK');
\Pecee\Locale::GetInstance()->setDefaultLocale('da-DK');

// Add IP's that are allowed to debug, clear-cache etc.
$site->addAdminIp('127.0.0.1');
$site->addAdminIp('::1');
/* ---------- Configuration end ---------- */
