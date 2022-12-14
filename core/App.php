<?php

namespace core;

if (PHP_MAJOR_VERSION < 8) {
    die('Required php version is >= 8');
}

class App {
    public static $app;
    public static $root;

    public function __construct()
    {
        self::$root = dirname(__DIR__);
        include self::$root . '/core/functions.php';
        self::init();
        new ErrorHandler();
        self::$app = Registry::getInstance();
        $this->getParams();
    }

    public static function start() {
        $query = $_SERVER['REQUEST_URI'];
        $query = trim(urldecode($query), '/');
        Router::dispatch($query);
    }

    protected function getParams() {
        $paramsPath = CONFIG . '/properties.php';
        
        if (is_file($paramsPath)) {
            $params = require_once $paramsPath;

            if (!empty($params)) {
                foreach ($params as $k => $v) {
                    self::$app->setProperty($k, $v);
                }
            }
        }
    }

    protected static function init() {
        require self::$root . '/config/constants.php';
    }

    protected static function initDev() {
        require self::$root . '/config/constants-dev.php';
    }

    public static function addRoutes($filePath) {
        require_once ROOT . $filePath;
    }
}
