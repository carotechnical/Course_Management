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
            'deleted' => array(),
        )
    );

    /**
     * return all location depend conditions
     * @author PhucLV
     *
     * @param array $conditions
     * @return array
     */
    public function getList($conditions = array())
    {
        $default = 'deleted=0';
        if(!empty($conditions))
        {
            foreach($conditions as $k => $v)
            {
                $default .= ' AND '.$k.'='.'"'.$v.'"';
            }
        }
        $options = array(
            $default,
        );
        $locations = self::find($options);

        $output = array();
        foreach($locations as $location)
        {
            $output[] = array(
                'id' => $location->id,
                'created' => $location->created,
                'user_created_id' => $location->user_created_id,
                'deleted' => $location->deleted,
                'name' => $location->name,
                'parent_type' => $location->parent_type,
                'parent_id' => $location->parent_id,
                'country' => $location->country,
                'province' => $location->province,
                'district' => $location->district,
                'address' => $location->address,
            );
        }
        return $output;
    }

}