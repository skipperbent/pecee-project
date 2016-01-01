<?php

use \Pecee\Translation;

$key = \Pecee\Registry::getInstance();
$site = \Pecee\UI\Site::getInstance();
/* ---------- Configuration start ---------- */

// Set the framework to use XML for language
Translation::getInstance()->setType(Translation::TYPE_XML);

// Add IP's that are allowed to debug, clear-cache etc.
$site->addAdminIp('127.0.0.1');
$site->addAdminIp('::1');

/* ---------- Configuration end ---------- */
