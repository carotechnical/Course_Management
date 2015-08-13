<?php
/**
 * Created by PhpStorm.
 * User: Hieu Nguyen
 * Date: 8/10/2015
 * Time: 2:43 PM
 */

namespace Modules\Backend\Models;

use Phalcon\Validation;

class OrganizationTypes extends ModelBase
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
                'label' => 'Name',
                'search' => true,
                'operator' => 'like',
                'link' => true
            )
        ),
    );

    public $detail_view = array(
        'title' => 'name',
        'fields' => array(
            'name' => array(
                'type' => 'text',
                'label' => 'Name',
            )
        ),
    );

    public $edit_view = array(
        'title' => 'name',
        'fields' => array(
            'name' => array(
                'type' => 'text',
                'label' => 'Full name',
                'required' => true
            )
        )
    );

    public $menu = array(
        'View Organization Types' => '/admin/organization_types/list',
        'Create Organization Type' => '/admin/organization_types/edit'
    );

    public function validation()
    {
        $validation = new Validation();

        $validation->add('name', new Validation\Validator\PresenceOf(array('message' => _('The name is required'))));
    }
} 