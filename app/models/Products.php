<?php
/**
 * Created by PhpStorm.
 * User: lttun
 * Date: 4/9/2016
 * Time: 2:09 PM
 */

namespace dailysale\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\Model\Validator\Uniqueness;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;
use Phalcon\DI\FactoryDefault;

class Products extends \Phalcon\Mvc\Model{

    /**
     * @var integer
     */
    public $id;

    /**
     * @var integer
     */
    public $supplier_id;
    /**
     * @var integer
     */
    public $category_id;
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $price;
    /**
     * @var string
     */
    public $purchase_price;

    /**
     * @var string
     */
    public $active;

    /**
     * Products initializer
     */
    public function initialize()
    {
        $this->belongsTo('supplier_id', 'dailysale\Models\Suppliers', 'id', array(
            'reusable' => true
        ));
        $this->belongsTo('category_id', 'dailysale\Models\Category', 'id', array(
            'reusable' => true
        ));
    }

    /**
     * Returns a human representation of 'active'
     *
     * @return string
     */
    public function getActiveDetail()
    {
        if ($this->active == 'Y') {
            return 'Yes';
        }
        return 'No';
    }

//    public static function getBuilder()
//    {
//        $di = FactoryDefault::getDefault();
//
//        return $di->get('modelsManager')->createBuilder();
//    }
//
//    public static function getConnection()
//    {
//        $di = FactoryDefault::getDefault();
//
//        return $di->get('db');
//    }

    public static function getFullProduct()
    {
        $phql  = "SELECT p.*, c.name as category_name, s.name as supplier_name FROM products p LEFT JOIN category c on p.category_id = c.id LEFT JOIN suppliers s on s.id = p.supplier_id";
        $product = new Products();
        return new Resultset(null, $product, $product->getReadConnection()->query($phql, array()));
    }

}