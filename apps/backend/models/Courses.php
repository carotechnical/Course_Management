<?php
/**
 * Created by PhucLV.
 * Date: 8/10/2015
 * Time: 9:10 AM
 */

namespace Modules\Backend\Models;


class Courses extends ModelBase{

    public $list_view = array(
        'fields' => array(
            'name' => array(
                'type' => 'text',
                'label' => 'Tên',
                'link' => true,
                'search' => true,
                'operator' => 'like'
            ),
            'start_date' => array(
                'type' => 'text',
                'label' => 'Bắt đầu'
            ),
            'end_date' => array(
                'type' => 'text',
                'label' => 'Kết thúc'
            )
        ),
    );

    public $edit_view = array(
        'title' => 'name',
    );

    public $detail_view = array(
        'title' => 'name'
    );

    public $menu = array(
        'Create Course' => '/admin/courses/edit',
        'List Courses' => '/admin/courses',
    );
}