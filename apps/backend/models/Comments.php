<?php
/**
 * Created by Jacky.
 * User: Jacky
 * Date: 8/4/2015
 * Time: 1:28 PM
 * Project: Course_Management
 * File: Comments.php
 */

namespace Modules\Backend\Models;


class Comments extends ModelBase
{
    public $id;
    public $created;
    public $user_created_id;
    public $deleted;
    public $status;
    public $content;
    public $rating;
    public $parent_id;
    public $parent_type;

    const STATUS_PENDING = 0;
    const STATUS_APPROVED = 1;
    const STATUS_REJECTED = 9;

    public $list_view = array(
        'fields' => array(
            'content' => array(
                'type' => 'text',
                'label' => 'Comment'
            ),
            'rating' => array(
                'type' => 'text',
                'label' => 'Rating',
            ),
            'parent_type' => array(
                'type' => 'select',
                'label' => 'On',
                'options' => 'comments_parent_type_list'
            )
        )
    );
}