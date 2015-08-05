<?php
/**
 * Created by PhucLV.
 * Date: 8/4/2015
 * Time: 3:28 PM
 */

namespace Modules\Backend\Controllers;


class LocationsController extends ControllerBase{
    protected $model_name = 'Locations';

    public function selectAction()
    {

    }

    public function indexAction()
    {
        $this->listAction();
    }

}