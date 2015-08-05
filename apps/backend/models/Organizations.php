<?php
/**
 * Created by PhucLV.
 * Date: 8/4/2015
 * Time: 10:27 AM
 */

namespace Modules\Backend\Models;

class Organizations extends ModelBase {
    public $id;
    public $created;
    public $user_created_id;
    public $deleted;
    public $name;
    public $description;
    public $website;
    public $office_phone;
    public $fax;
    public $note;
    public $teacher;
    public $intro_url;
    public $social_link;

    public $list_view = array(
        'fields' => array(
            'name' => array(
                'type' => 'text',
                'label' => 'Tên',
                'link' => true,
                'search' => true,
                'operator' => 'like'
            ),
            'website' => array(
                'type' => 'text',
                'label' => 'Website'
            ),
            'office_phone' => array(
                'type' => 'text',
                'label' => 'Điện thoại'
            )
        ),
    );

    public $edit_view = array(
        'title' => 'name',
        'fields' => array(
            'name' => array(),
            'description' => array(),
            'website' => array(),
            'office_phone' => array(),
            'fax' => array(),
            'teacher' => array(),
            'note' => array(),
            'intro_url' => array(),
            'social_link' => array(),
        )
    );

    public $menu = array(
        'Create Organization' => '/admin/organizations/edit',
        'List Organization' => '/admin/organizations',
    );
}