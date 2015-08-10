<?php
/**
 * Created by PhucLV.
 * Date: 7/31/2015
 * Time: 9:10 AM
 */

namespace Modules\Backend\Controllers;


class CoursesController extends ControllerBase {
    protected $model_name = 'Courses';

    public function indexAction()
    {
        $this->listAction();
    }
}