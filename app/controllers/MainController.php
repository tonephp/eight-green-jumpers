<?php

namespace app\controllers;

use core\Controller;

class MainController extends Controller
{

    public function indexAction()
    {
        $this->layout = 'ishop';

        $names = $this->model->get_names();
        $this->setMeta('Main page', 'Description', 'Keywords');
        $this->set(compact('names'));
    }

}