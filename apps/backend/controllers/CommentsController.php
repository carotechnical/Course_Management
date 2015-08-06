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


use Modules\Backend\Models\Comments;

class CommentsController extends ControllerBase
{
    protected $model_name = 'Comments';

    public function indexAction()
    {
        $this->listAction();
    }

    public function approveAction($id)
    {
        $comment = Comments::findFirst($id);
        $success = false;

        if ($comment != false) {
            $comment->status = Comments::STATUS_APPROVED;
            $success = $comment->update();
        }
        if ($success) {
            $this->resJson(array('status' => 0, 'msg' => 'Comment approved'));
        } else {
            $this->resJson(array('status' => 1, 'msg' => 'Unknown error'));
        }
    }

    public function rejectAction($id)
    {
        $comment = Comments::findFirst($id);
        $success = false;

        if ($comment != false) {
            $comment->status = Comments::STATUS_REJECTED;
            $success = $comment->update();
        }
        if ($success) {
            $this->resJson(array('status' => 0, 'msg' => 'Comment rejected'));
        } else {
            $this->resJson(array('status' => 1, 'msg' => 'Unknown error'));
        }
    }
}