<?php
/**
 * Created by PhpStorm.
 * User: Hieu Nguyen
 * Date: 8/10/2015
 * Time: 2:43 PM
 */

namespace Modules\Backend\Models;

use Phalcon\Validation;

class CourseTypes extends ModelBase
{
    public $id;
    public $created;
    public $user_created_id;
    public $deleted;
    public $name;
    public $description;

    public $list_view = array(
        'fields' => array(
            'name' => array(
                'type' => 'text',
                'label' => 'Name',
                'search' => true,
                'operator' => 'like',
                'link' => true
            ),
            'description' => array(
                'type' => 'text',
                'label' => 'Description',
            ),
        ),
    );

    public $detail_view = array(
        'title' => 'name',
        'fields' => array(
            'name' => array(
                'type' => 'text',
                'label' => 'Name',
            ),
            'description' => array(
                'type' => 'textarea',
                'label' => 'Description',
            ),
        ),
    );

    public $edit_view = array(
        'title' => 'name',
        'fields' => array(
            'name' => array(
                'type' => 'text',
                'label' => 'Full name',
                'required' => true
            ),
            'description' => array(
                'type' => 'textarea',
                'label' => 'Description',
            ),
        )
    );

    public $menu = array(
        'View Course Types' => '/admin/course_types/list',
        'Create Course Type' => '/admin/course_types/edit'
    );

    public function validation()
    {
        $validation = new Validation();

        $validation->add('name', new Validation\Validator\PresenceOf(array('message' => _('The name is required'))));
    }
} 