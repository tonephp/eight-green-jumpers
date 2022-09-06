<?php

namespace core;

class App {
    public static $app;

    public function __construct()
    {
        self::init();
        self::$app = Registry::getInstance();
        $this->getParams();
    }

    protected function getParams() {
        $params = require_once CONFIG . '/params.php';

        if (!empty($params)) {
            foreach ($params as $k => $v) {
                self::$app->setProperty($k, $v);
            }
        }
    }

    protected static function init() {
        define('PUBLIC', __DIR__ . '/../../../../public');
        define('ROOT', dirname(__DIR__ . '/../../../../..'));
        define("APP", ROOT . "/app");
        define("CORE", dirname(__DIR__) . "/core");
        define("HELPERS", ROOT . "/helpers");
        define("CACHE", ROOT . '/tmp/cache');
        define("LOGS", ROOT . '/tmp/logs');
        define("CONFIG", ROOT . '/config');
        define("LAYOUT", "default");

        include CORE . '/functions.php';

        define("PATH", siteUrl());
        define("ADMIN", PATH . '/admin');
        define("NO_IMAGE", 'uploads/no_image.jpg');
    }
}