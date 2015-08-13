<?php
/**
 * Created by PhpStorm.
 * User: Hieu Nguyen
 * Date: 8/13/2015
 * Time: 10:22 AM
 */

namespace Modules\Backend\Controllers;


class OrganizationTypesController extends ControllerBase{
    protected $model_name = 'OrganizationTypes';

    public function indexAction()
    {
        $this->listAction();
    }
} 