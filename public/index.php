<?php

require_once '../vendor/autoload.php';

define("DEBUG", true);

new \core\App;

\core\App::addRoutes('/app/routes.php');
\core\App::start();