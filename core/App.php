<?php

namespace core;

if (PHP_MAJOR_VERSION < 8) {
    die('Required php version is >= 8');
}

class App {
    public static $app;

    public function __construct()
    {
        include '../core/functions.php';
        self::init();
        new ErrorHandler();
        self::$app = Registry::getInstance();
        $this->getParams();
    }

    protected function getParams() {
        $paramsPath = CONFIG . '/params.php';
        
        if (is_file($paramsPath)) {
            $params = require_once CONFIG . '/params.php';

            if (!empty($params)) {
                foreach ($params as $k => $v) {
                    self::$app->setProperty($k, $v);
                }
            }
        }
    }

    protected static function init() {
        require dirname(__DIR__) . '/config/constants.php';
    }

    protected static function initDev() {
        require dirname(__DIR__) . '/config/constants-dev.php';
    }
}
