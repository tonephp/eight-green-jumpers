<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("PUBLIC", ROOT . "/public");
define("APP", ROOT . "/app");
define("CORE", ROOT . "/core");
define("HELPERS", ROOT . "/helpers");
define("CACHE", ROOT . '/tmp/cache');
define("LOGS", ROOT . '/tmp/logs');
define("CONFIG", ROOT . '/config');
define("LAYOUT", "default");

include CORE . '/functions.php';

define("PATH", siteUrl());
define("ADMIN", PATH . '/admin');
define("NO_IMAGE", 'uploads/no_image.jpg');

require_once ROOT . '/vendor/autoload.php';