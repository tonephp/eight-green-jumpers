<?php

require_once '../vendor/autoload.php';

define("DEBUG", 1);

new \core\App;

debug(app()->getProperties());

throw new Exception('Some error');
