<?php
/**
 * Created by PhpStorm.
 * User: lttun
 * Date: 4/11/2016
 * Time: 4:33 PM
 */

namespace dailysale\Controllers;

use Phalcon\Tag;
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use dailysale\Forms\SuppliersForm;
use dailysale\Models\Suppliers;
class SuppliersController extends ControllerBase
{
    public function initialize()
    {
        $this->view->setTemplateBefore('private');
    }
    public function indexAction()
    {
        $numberPage = 1;
//        if ($this->request->isPost()) {
//            $query = Criteria::fromInput($this->di, 'dailysale\Models\Users', $this->request->getPost());
//            $this->persistent->searchParams = $query->getParams();
//        } else {
//            $numberPage = $this->request->getQuery("page", "int");
//        }

        $parameters = array();
        if ($this->persistent->searchParams) {
            $parameters = $this->persistent->searchParams;
        }

        $supplier = Suppliers::find($parameters);
        if (count($supplier) == 0) {
            $this->flash->notice("The search did not find any users");
            return $this->dispatcher->forward(array(
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $supplier,
            "limit" => 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }
    /**
     * Creates a new Suppliers
     */
    public function createAction()
    {
        if ($this->request->isPost()) {

            $supplier = new Suppliers();

            $supplier->assign(array(
                'name' => $this->request->getPost('name', 'striptags'),
                'contact_name'=>$this->request->getPost('contact_name', 'striptags'),
                'address'=>$this->request->getPost('address', 'striptags'),
                'city'=>$this->request->getPost('city', 'striptags'),
                'phone'=>$this->request->getPost('phone', 'striptags'),
            ));

            if (!$supplier->save()) {
                $this->flash->error($supplier->getMessages());
            } else {
                $this->flash->success("category was created successfully");
            }

            Tag::resetInput();
        }

        $this->view->form = new SuppliersForm(null);
    }
    /**
     * Edits an existing Suppliers
     *
     * @param int $id
     */
    public function editAction($id)
    {
        $supplier = Suppliers::findFirstById($id);
        if (!$supplier) {
            $this->flash->error("Suppliers was not found");
            return $this->dispatcher->forward(array(
                'action' => 'index'
            ));
        }

        if ($this->request->isPost()) {

            $supplier->assign(array(
                'name' => $this->request->getPost('name', 'striptags'),
                'contact_name'=>$this->request->getPost('contact_name', 'striptags'),
                'address'=>$this->request->getPost('address', 'striptags'),
                'city'=>$this->request->getPost('city', 'striptags'),
                'phone'=>$this->request->getPost('phone', 'striptags'),
            ));

            if (!$supplier->save()) {
                $this->flash->error($supplier->getMessages());
            } else {
                $this->flash->success("Suppliers was updated successfully");
            }

            Tag::resetInput();
        }

        $this->view->form = new SuppliersForm($supplier, array(
            'edit' => true
        ));

        $this->view->category = $supplier;
    }

    /**
     * Deletes a Suppliers
     *
     * @param int $id
     */
    public function deleteAction($id)
    {
        $supplier = Suppliers::findFirstById($id);
        if (!$supplier) {
            $this->flash->error("User was not found");
            return $this->dispatcher->forward(array(
                'action' => 'index'
            ));
        }

        if (!$supplier->delete()) {
            $this->flash->error($supplier->getMessages());
        } else {
            $this->flash->success("Suppliers was deleted");
        }

        return $this->dispatcher->forward(array(
            'action' => 'index'
        ));
    }






}