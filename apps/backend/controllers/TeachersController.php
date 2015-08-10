<?php
/**
 * Created by PhpStorm.
 * User: Hieu Nguyen
 * Date: 8/7/2015
 * Time: 9:12 AM
 */

namespace Modules\Backend\Controllers;


class TeachersController extends ControllerBase{
    protected $model_name = 'Teachers';

    public function indexAction()
    {
        $this->listAction();
    }
} 