<?php

namespace core;

class ErrorHandler {
    public function __construct() {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
        set_error_handler([$this, 'errorHandler']);
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
    }

    public function exceptionHandler(\Throwable $e) {
        $this->logError($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Exception', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    public function errorHandler($errno, $errstr, $errfile, $errline) {
        $this->logError($errstr, $errfile, $errline);
        $this->displayError($errno, $errstr, $errfile, $errline);
    }

    public function fatalErrorHandler() {
        $error = error_get_last();

        if (!empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)) {
            $this->logError($error['message'], $error['file'], $error['line']);
            ob_end_clean();
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        } else {
            ob_end_flush();
        }
    }

    protected function logError($message = '', $file = '', $line = '') {
        $logsPath = LOGS;
        $tmpPath = TMP;

        if (!is_dir($tmpPath)) {
            mkdir($tmpPath);
        }

        if (!is_dir($logsPath)) {
            mkdir($logsPath);
        }

        file_put_contents(
            LOGS . '/errors.log',
            "[" . date('Y-m-d H:i:s') . "] Message: {$message} | File: {$file} | Line: {$line}\n=================\n",
            FILE_APPEND
        );
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $responce = 500) {
        if ($responce == 0) {
            $responce = 404;
        }
        http_response_code($responce);
        if ($responce == 404 && !DEBUG) {
            $userFilePath = WWW . '/errors/404.php';

            if (is_file($userFilePath)) {
                require $userFilePath;
            } else {
                require CORE . '/errors/404.php';
            }
            
            die;
        }
        if (DEBUG) {
            $userFilePath = WWW . '/errors/development.php';

            if (is_file($userFilePath)) {
                require $userFilePath;
            } else {
                require CORE . '/errors/development.php';
            }

        } else {
            $userFilePath = WWW . '/errors/production.php';

            if (is_file($userFilePath)) {
                require $userFilePath;
            } else {
                require CORE . '/errors/production.php';
            }
            
        }
        die;
    }
}