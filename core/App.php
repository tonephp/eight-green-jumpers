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
        $params = require_once CONFIG . '/params.php';

        if (!empty($params)) {
            foreach ($params as $k => $v) {
                self::$app->setProperty($k, $v);
            }
        }
    }

    protected static function init() {
        require '../config/constants.php';
    }

    protected static function initDev() {
        require '../config/constants-dev.php';
    }
}
