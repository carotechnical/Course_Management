<?php
/**
 * Created by Jacky.
 * User: Jacky
 * Date: 8/4/2015
 * Time: 9:31 AM
 * Project: Course_Management
 * File: Categories.php
 */

namespace Modules\Backend\Models;


class Categories extends ModelBase
{
    public $id;
    public $created;
    public $user_created_id;
    public $deleted;
    public $name;
    public $slug;
    public $description;
    public $parent_id;

    public $list_view = array(
        'fields' => array(
            'name' => array(
                'type' => 'text',
                'label' => 'Name',
                'link' => true,
                'search' => true,
                'operator' => 'like'
            ),
            'parent_id' => array(
                'type' => 'relate',
                'model' => 'Categories',
                'label' => 'Parent'
            )
        )
    );

    public $detail_view = array(
        'title' => 'name',
        'fields' => array(
            'name' => array(
                'type' => 'text',
                'label' => 'Name',
            ),
            'slug' => array(
                'type' => 'text',
                'label' => 'Slug',
            ),
            'parent_id' => array(
                'type' => 'relate',
                'model' => 'Categories',
                'label' => 'Parent'
            )
        )
    );

    public $edit_view = array(
        'title' => 'name',
        'fields' => array(
            'name' => array(
                'type' => 'text',
                'label' => 'Name',
                'required' => true
            ),
            'slug' => array(
                'type' => 'text',
                'label' => 'Slug',
            ),
            'parent_id' => array(
                'type' => 'relate',
                'model' => 'Categories',
                'label' => 'Parent'
            )
        )
    );
}