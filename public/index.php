<?php

require_once '../vendor/autoload.php';

define("DEBUG", false);

new \core\App;

throw new Exception('Some error');
