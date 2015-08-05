<?php
/**
 * Created by PhucLV
 * Date: 7/30/2015
 * Time: 9:27 AM
 */

namespace Modules\Backend\Controllers;


use Modules\Backend\Models\Locations;

class OrganizationsController extends ControllerBase{
    protected $model_name = 'Organizations';

    public function indexAction()
    {
        $this->listAction();
    }

    public function editAction($id = null)
    {
        $model = $this->getModel();
        if ($id) {
            $data = $model::findFirst($id);

            $title = $this->t->_('Edit ') . $this->t->_($this->model_name) . ': ' . $data->{$model->edit_view['title']};

        } else {
            $title = $this->t->_('Create ') . $this->t->_($this->model_name);
        }

        $this->tag->setTitle($title);
        $this->view->title = $title;

        $this->view->edit_view = $model->edit_view;
        $this->view->data = $data;

        $this->view->controller = strtolower($this->controller_name);
        $this->view->action = 'save';
        $this->view->menu = $model->menu;
    }

    public function saveAction()
    {
        $data = $this->request->getPost();
        $record = $this->saveRecord($data);

        for($i = 0; $i < count($data['location_id']); $i++)
        {
            $data_location = array(
                'model_name' => 'Locations',
                'id' => $data['location_id'][$i],
                'parent_type' => 'Organizations',
                'parent_id' => $record->id,
                'country' => $data['location_country'][$i],
                'province' => $data['location_province'][$i],
                'district' => $data['location_district'][$i],
                'address' => $data['location_address'][$i],
            );
            $this->saveRecord($data_location);
        }

        $this->response->redirect('/admin/organizations/detail/' . $record->id);
    }
    public function detailAction($id = null)
    {
        $model = $this->getModel();

        if ($id) {
            $data = $model::findFirst($id);

            $title = $this->t->_('Detail ') . $this->t->_($this->model_name) . ': ' . $data->{$model->detail_view['title']};

        }

        $this->tag->setTitle($title);
        $this->view->title = $title;

        $this->view->edit_view = $model->edit_view;
        $this->view->data = $data;

        $this->view->controller = strtolower($this->controller_name);
        $this->view->action = 'save';
        $this->view->menu = $model->menu;
    }


}