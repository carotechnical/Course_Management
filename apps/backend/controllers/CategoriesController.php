<?php
/**
 * Created by Jacky.
 * User: Jacky
 * Date: 8/4/2015
 * Time: 9:30 AM
 * Project: Course_Management
 * File: CategoriesController.php
 */

namespace Modules\Backend\Controllers;


class CategoriesController extends ControllerBase
{
    protected $model_name = 'Categories';

    public function indexAction()
    {
        $this->listAction();
    }
}