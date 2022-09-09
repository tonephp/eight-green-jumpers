<?php

namespace app\controllers;

use core\Controller;

class MainController extends Controller
{

    public function indexAction()
    {
        $this->layout = 'ishop';
        //echo __METHOD__;
    }

}