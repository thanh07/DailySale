<?php
/**
 * Created by PhpStorm.
 * User: lttun
 * Date: 4/10/2016
 * Time: 1:27 PM
 */

namespace dailysale\Controllers;
use Phalcon\Tag;
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Mvc\Model\Resultset\Simple;
use Phalcon\Paginator\Adapter\Model as Paginator;
use dailysale\Forms\ChangePasswordForm;
use dailysale\Forms\ProductsForm;
use dailysale\Models\Products;
use dailysale\Models\PasswordChanges;

class ProductsController extends ControllerBase
{

    public function initialize()
    {
        $this->view->setTemplateBefore('private');
    }

    /**
     * Default action, shows the search form
     */
    public function indexAction()
    {
        $numberPage = 1;
//        if ($this->request->isPost()) {
//            $query = Criteria::fromInput($this->di, 'dailysale\Models\Products', $this->request->getPost());
//            $this->persistent->searchParams = $query->getParams();
//        } else {
//            $numberPage = $this->request->getQuery("page", "int");
//        }

        $parameters = array();
        if ($this->persistent->searchParams) {
            $parameters = $this->persistent->searchParams;
        }

//        $products = Products::find($parameters);
        $products = Products::getFullProduct();

//        $this->view->page = $products;
        if (count($products) == 0) {
            $this->flash->notice("The search did n  find any product");
            return $this->dispatcher->forward(array(
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $products,
            "limit" => 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Searches for users
     */
    public function searchAction()
    {
       
    }

    /**
     * Creates a User
     */
    public function createAction()
    {
        if ($this->request->isPost()) {

            $product = new Products();

            $product->assign(array(
                'name' => $this->request->getPost('name', 'striptags'),
                'category_id' => $this->request->getPost('category_id', 'int'),
                'supplier_id' => $this->request->getPost('supplier_id', 'int'),
                'purchase_price' => $this->request->getPost('purchase_price','float'),
                'price' => $this->request->getPost('price','float'),
                'active' => $this->request->getPost('active')
            ));

            if (!$product->save()) {
                $this->flash->error($product->getMessages());
            } else {

                $this->flash->success("User was created successfully");

                Tag::resetInput();
            }
        }

        $this->view->form = new ProductsForm(null);
    }

    /**
     * Saves the user from the 'edit' action
     */
    public function editAction($id)
    {
        $product = Products::findFirstById($id);
        if (!$product) {
            $this->flash->error("User was not found");
            return $this->dispatcher->forward(array(
                'action' => 'index'
            ));
        }

        if ($this->request->isPost()) {

            $product->assign(array(
                'name' => $this->request->getPost('name', 'striptags'),
                'category_id' => $this->request->getPost('category_id', 'int'),
                'supplier_id' => $this->request->getPost('supplier_id', 'int'),
                'purchase_price' => $this->request->getPost('purchase_price','float'),
                'price' => $this->request->getPost('price','float'),
                'active' => $this->request->getPost('active')
            ));

            if (!$product->save()) {
                $this->flash->error($product->getMessages());
            } else {

                $this->flash->success("User was updated successfully");

                Tag::resetInput();
            }
        }

        $this->view->user = $product;

        $this->view->form = new ProductsForm($product, array(
            'edit' => true
        ));
    }

    /**
     * Deletes a User
     *
     * @param int $id
     */
    public function deleteAction($id)
    {
        $product = Products::findFirstById($id);
        if (!$product) {
            $this->flash->error("User was not found");
            return $this->dispatcher->forward(array(
                'action' => 'index'
            ));
        }

        if (!$product->delete()) {
            $this->flash->error($product->getMessages());
        } else {
            $this->flash->success("Product was deleted");
        }

        return $this->dispatcher->forward(array(
            'action' => 'index'
        ));
    }


}