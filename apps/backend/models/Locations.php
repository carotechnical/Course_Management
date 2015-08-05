<?php
/**
 * Created by PhucLV.
 * Date: 8/4/2015
 * Time: 1:40 PM
 */

namespace Modules\Backend\Models;

use Phalcon\Mvc\Model\Query;

class Locations extends ModelBase{

    public $id;
    public $created;
    public $user_created_id;
    public $deleted;
    public $name;
    public $parent_type;
    public $parent_id;
    public $country;
    public $province;
    public $district;
    public $address;

    public $edit_view = array(
        'title' => 'name',
        'fields' => array(
            'parent_type' => array(),
            'parent_id' => array(),
            'country' => array(),
            'district' => array(),
            'province' => array(),
            'address' => array(),
        )
    );


}