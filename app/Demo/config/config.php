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