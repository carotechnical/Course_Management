<?php
/**
 * Created by PhpStorm.
 * User: Hieu Nguyen
 * Date: 8/7/2015
 * Time: 10:16 AM
 */

namespace Modules\Backend\Models;

use Phalcon\Validation;

class Teachers extends ModelBase
{
    public $id;
    public $created;
    public $user_created_id;
    public $deleted;
    public $name;
    public $avatar;
    public $description;

    public $list_view = array(
        'fields' => array(
            'name' => array(
                'type' => 'text',
                'label' => 'Full name',
                'search' => true,
                'operator' => 'like',
                'link' => true
            ),
            'avatar' => array(
                'type' => 'image',
                'label' => 'Avatar'
            ),
            'organization_id' => array(
                'type' => 'relate',
                'model' => 'Organizations',
                'search' => true,
                'operator' => 'like',
                'label' => 'Organization'
            ),
        ),
    );

    public $detail_view = array(
        'title' => 'name',
        'fields' => array(
            'name' => array(
                'type' => 'text',
                'label' => 'Full name',
            ),
            'organization_id' => array(
                'type' => 'relate',
                'model' => 'Organizations',
                'label' => 'Organization'
            ),
            'avatar' => array(
                'type' => 'image',
                'label' => 'Avatar'
            ),
            'description' => array(
                'type' => 'text',
                'label' => 'Description'
            ),
        ),
    );

    public $edit_view = array(
        'title' => 'name',
        'fields' => array(
            'organization_id' => array(
                'type' => 'relate',
                'model' => 'Organizations',
                'required' => true,
                'label' => 'Organization'
            ),
            'name' => array(
                'type' => 'text',
                'label' => 'Full name',
                'required' => true
            ),
            'avatar' => array(
                'type' => 'image',
                'label' => 'Avatar'
            ),
            'description' => array(
                'type' => 'text',
                'label' => 'Description'
            )
        )
    );

    public $menu = array(
        'View Teachers' => '/admin/teachers/list',
        'Create Teacher' => '/admin/teachers/edit'
    );

    public function validation()
    {
        $validation = new Validation();

        $validation->add('name', new Validation\Validator\PresenceOf(array('message' => _('The name is required'))));
    }
} 