<?php
/**
 * Created by PhucLV.
 * Date: 7/31/2015
 * Time: 9:10 AM
 */

namespace Modules\Backend\Controllers;


class CoursesController extends ControllerBase {
    protected $model_name = 'Courses';

    public function indexAction()
    {
        $this->listAction();
    }

    public function editAction($id = null)
    {
        $model = $this->getModel();
        $locations = array();
        if ($id) {
            $data = $model::findFirst($id);
            $title = $this->t->_('Edit ') . $this->t->_($this->model_name) . ': ' . $data->{$model->edit_view['title']};
            //locations
            $model_location = $this->getModel('Locations');
            $locations = $model_location->getList(array('parent_id' => $id));

        } else {
            $title = $this->t->_('Create ') . $this->t->_($this->model_name);
        }
        $this->view->locations = $locations;
        $this->tag->setTitle($title);
        $this->view->title = $title;
        $this->view->model_name = $this->model_name;
        $this->view->data = $data;

        $this->view->controller = strtolower($this->controller_name);
        $this->view->action = 'save';
        $this->view->menu = $model->menu;
    }

    public function saveAction()
    {
        $data = $this->request->getPost();
        $data['start_date'] = date('Y-m-d', strtotime(str_replace('/','-',$data['start_date'])));

        $record = $this->saveRecord($data);

        for($i = 0; $i < count($data['location_id']); $i++)
        {
            $data_location = array(
                'model_name' => 'Locations',
                'id' => $data['location_id'][$i],
                'parent_type' => $this->model_name,
                'parent_id' => $record->id,
                'country' => $data['location_country'][$i],
                'province' => $data['location_province'][$i],
                'district' => $data['location_district'][$i],
                'address' => $data['location_address'][$i],
                'deleted' => $data['location_deleted'][$i],
            );
            if($data_location['deleted'] == 1 && empty($data_location['id']))
            {
            }
            else
            {
                $this->saveRecord($data_location);
            }
        }

        $this->response->redirect('/admin/courses/detail/' . $record->id);
    }

    public function detailAction($id = null)
    {
        $model = $this->getModel();
        $locations = array();
        if ($id) {
            $data = $model::findFirst($id);

            $title = $this->t->_('Detail ') . $this->t->_($this->model_name) . ': ' . $data->{$model->detail_view['title']};

            $model_location = $this->getModel('Locations');
            $locations = $model_location->getList(array('parent_id' => $id));
        }


        $this->tag->setTitle($title);
        $this->view->title = $title;

        $this->view->edit_view = $model->edit_view;
        $this->view->data = $data;
        $this->view->locations = $locations;

        $this->view->controller = strtolower($this->controller_name);
        $this->view->action = 'save';
        $this->view->menu = $model->menu;
    }
}
