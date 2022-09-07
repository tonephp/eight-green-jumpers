<?php

define('WWW', __DIR__ . '/../../../../public');
define('ROOT', dirname(__DIR__ . '/../../../../..'));
define("APP", ROOT . "/app");
define("CORE", dirname(__DIR__) . "/core");
define("HELPERS", ROOT . "/helpers");
define("TMP", ROOT . "/tmp");
define("CACHE", TMP . '/cache');
define("LOGS", TMP . '/logs');
define("CONFIG", ROOT . '/config');
define("LAYOUT", "default");
define("PATH", siteUrl());
define("ADMIN", PATH . '/admin');
define("NO_IMAGE", 'uploads/no_image.jpg');