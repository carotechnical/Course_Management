<?php
/**
 * Created by Jacky.
 * User: Jacky
 * Date: 7/24/2015
 * Time: 5:09 PM
 * Project: carofw
 * File: database_structures.php
 */

use \Phalcon\Db\Column as Column;

return array(
    'users' => array(
        'fields' => array(
            'username' => array(
                "type"    => Column::TYPE_VARCHAR,
                "size"    => 255,
                "notNull" => true,
            ),
            'email' => array(
                "type"    => Column::TYPE_VARCHAR,
                "size"    => 255,
                "notNull" => true,
            ),
            'password' => array(
                "type"    => Column::TYPE_CHAR,
                "size"    => 32,
                "notNull" => true,
            ),
            'name' => array(
                "type"    => Column::TYPE_VARCHAR,
                "size"    => 255,
                "notNull" => true,
            ),
            'status' => array(
                "type"    => Column::TYPE_VARCHAR,
                "size"    => 255,
                "notNull" => true,
            ),
        ),
        'indexes' => array(
            'idx_username' => array(
                'type' => 'Unique',
                'fields' => array('username')
            ),
            'idx_email' => array(
                'type' => 'Unique',
                'fields' => array('email')
            )
        )
    ),
    // ACL
    'user_groups' => array(
        'fields' => array(
            'name' => array(
                'type' => Column::TYPE_VARCHAR,
                'size' => 255,
                'notNull' => true
            ),
            'status' => array(
                'type' => Column::TYPE_VARCHAR,
                'size' => 255,
                'notNull' => true
            ),
            'description' => array(
                'type' => Column::TYPE_TEXT
            ),
            'role_id' => array(
                'type' => Column::TYPE_INTEGER,
                'size' => 10
            )
        ),
        'indexes' => array()
    ),
    'user_groups_users' => array(
        'fields' => array(
            'user_id' => array(
                'type' => Column::TYPE_INTEGER,
                'size' => 10,
                'notNull' => true
            ),
            'group_id' => array(
                'type' => Column::TYPE_INTEGER,
                'size' => 10,
                'notNull' => true
            )
        ),
        'indexes' => array(
            'idx_unique' => array(
                'type' => 'Unique',
                'fields' => array('user_id', 'group_id')
            )
        )
    ),
    'auth_roles' => array(
        'fields' => array(
            'name' => array(
                'type' => Column::TYPE_VARCHAR,
                'size' => 255,
                'notNull' => true
            ),
            'description' => array(
                'type' => Column::TYPE_TEXT
            ),
        ),
        'indexes' => array()
    ),

    'settings' => array(
        'fields' => array(
            'name' => array(
                "type"    => Column::TYPE_VARCHAR,
                "size"    => 255,
                "notNull" => true,
            ),
            'value' => array(
                "type"    => Column::TYPE_TEXT,
                "notNull" => false,
            ),
        ),
        'indexes' => array(
            'idx_unique' => array(
                'type' => 'Unique',
                'fields' => array('name')
            )
        )
    ),

    'courses' => array(
        'fields' => array(
            'name' => array(
                'type' => Column::TYPE_VARCHAR,
                'size' => 255,
                'notNull' => true
            ),
            'slug' => array(
                'type' => Column::TYPE_VARCHAR,
                'size' => 255,
            ),
            'description' => array(
                'type' => Column::TYPE_TEXT,
                'notNull' => false
            ),
            'date_modified' => array(
                'type' => Column::TYPE_DATETIME,
                'notNull' => false
            ),
            'course_type_id' => array(
                'type' => Column::TYPE_INTEGER,
                'notNull' => false,
                'size' => 10
            ),
            'start_date' => array(
                'type' => Column::TYPE_DATETIME,
                'notNull' => false
            ),
            'end_date' => array(
                'type' => Column::TYPE_DATETIME,
                'notNull' => false
            ),
            'note' => array(
                'type' => Column::TYPE_TEXT,
                'notNull' => false
            ),
            'fee' => array(
                'type' => Column::TYPE_INTEGER,
                'notNull' => false,
                'size' => 10
            ),
            'teacher_ids' => array(
                'type' => Column::TYPE_TEXT,
                'notNull' => false
            ),
            'location_id' => array(
                'type' => Column::TYPE_INTEGER,
                'notNull' => false,
                'size' => 10
            ),
            'category_id' => array(
                'type' => Column::TYPE_INTEGER,
                'notNull' => false,
                'size' => 10
            )
        )
    ),

    'course_types' => array(
        'fields' => array(
            'name' => array(
                'type' => Column::TYPE_VARCHAR,
                'size' => 255,
                'notNull' => true
            )
        )
    ),

    'teachers' => array(
        'fields' => array(
            'name' => array(
                'type' => Column::TYPE_VARCHAR,
                'size' => 255,
                'notNull' => true
            )
        )
    ),

    'locations' => array(
        'fields' => array(
            'parent_type' => array(
                'type' => Column::TYPE_VARCHAR,
                'size' => 100,
                'notNull' => false
            ),
            'parent_id' => array(
                'type' => Column::TYPE_INTEGER,
                'notNull' => false
            ),
            'country' => array(
                'type' => Column::TYPE_VARCHAR,
                'size' => 255,
                'notNull' => false
            ),
            'province' => array(
                'type' => Column::TYPE_VARCHAR,
                'size' => 255,
                'notNull' => false
            ),
            'district' => array(
                'type' => Column::TYPE_VARCHAR,
                'size' => 255,
                'notNull' => false
            ),
            'address' => array(
                'type' => Column::TYPE_TEXT,
                'notNull' => false
            ),
        )
    ),

    'schedules' => array(
        'fields' => array(
            'name' => array(
                'type' => Column::TYPE_VARCHAR,
                'size' => 255,
                'notNull' => true
            ),
            'description' => array(
                'type' => Column::TYPE_TEXT
            )
        )
    ),

    'categories' => array(
        'fields' => array(
            'name' => array(
                'type' => Column::TYPE_VARCHAR,
                'size' => 255,
                'notNull' => true
            ),
            'slug' => array(
                'type' => Column::TYPE_VARCHAR,
                'size' => 255,
            ),
            'parent_id' => array(
                'type' => Column::TYPE_INTEGER,
                'notNull' => false,
                'size' => 10
            ),
        )
    ),

    'organizations' => array(
        'fields' => array(
            'name' => array(
                'type' => Column::TYPE_VARCHAR,
                'size' => 255,
                'notNull' => true
            ),
            'description' => array(
                'type' => Column::TYPE_TEXT,
                'notNull' => false
            ),
            'website' => array(
                'type' => Column::TYPE_VARCHAR,
                'notNull' => false,
                'size' => 255
            ),
            'office_phone' => array(
                'type' => Column::TYPE_VARCHAR,
                'notNull' => false,
                'size' => 20
            ),
            'fax' => array(
                'type' => Column::TYPE_VARCHAR,
                'notNull' => false,
                'size' => 20
            ),
            'social_link' => array(
                'type' => Column::TYPE_TEXT,
                'notNull' => false
            ),
            'teacher' => array(
                'type' => Column::TYPE_TEXT,
                'notNull' => false
            ),
            'note' => array(
                'type' => Column::TYPE_TEXT,
                'notNull' => false
            ),
            'intro_url' => array(
                'type' => Column::TYPE_TEXT,
                'notNull' => false
            ),
        )
    ),

    'comments' => array(
        'fields' => array(
            'content' => array(
                'type' => Column::TYPE_TEXT,
                'notNull' => true
            ),
            'rating' => array(
                'type' => Column::TYPE_INTEGER,
                'notNull' => true,
                'size' => 1
            ),
            'status' => array(
                "type"    => Column::TYPE_VARCHAR,
                "size"    => 255,
                "notNull" => true,
            ),
            'parent_id' => array(
                'type' => Column::TYPE_INTEGER,
                'notNull' => true,
                'size' => 10
            ),
            'parent_type' => array(
                'type' => Column::TYPE_VARCHAR,
                'notNull' => true,
                'size' => 50
            )
        )
    ),

    'news' => array(
        'fields' => array(
            'name' => array(
                'type' => Column::TYPE_VARCHAR,
                'size' => 255,
                'notNull' => true
            ),
            'description' => array(
                'type' => Column::TYPE_TEXT,
                'notNull' => true
            ),
            'content' => array(
                'type' => Column::TYPE_TEXT,
                'notNull' => true
            ),
        )
    ),

);