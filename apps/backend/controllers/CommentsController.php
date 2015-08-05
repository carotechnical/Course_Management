<?php
/**
 * Created by Jacky.
 * User: Jacky
 * Date: 8/4/2015
 * Time: 1:27 PM
 * Project: Course_Management
 * File: CommentsController.php
 */

namespace Modules\Backend\Controllers;


class CommentsController extends ControllerBase
{
    protected $model_name = 'Comments';

    public function indexAction()
    {
        $this->listAction();
    }
}