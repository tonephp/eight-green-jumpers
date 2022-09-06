<?php

function siteUrl() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'].'/';
    
    return $protocol.$domainName;
}

function debug($arr) {
    echo '<pre class="debug">' . print_r($arr, true) . '</pre>';
}

function app() {
    return \core\App::$app;
}