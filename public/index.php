<?php

if (PHP_MAJOR_VERSION < 8) {
    die('Required php version is >= 8');
}

require_once '../vendor/autoload.php';

new \core\App;

debug(app()->getProperties());


