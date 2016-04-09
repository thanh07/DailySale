<?php
/**
 * Created by PhpStorm.
 * User: lttun
 * Date: 4/9/2016
 * Time: 2:00 PM
 */

namespace dailysale\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\Uniqueness;
class Suppliers extends Model
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    public $contact_name;
    public $address;
    public $city;
    public $phone;

    /**
     * Suppliers initializer
     */
    public function initialize()
    {
        $this->hasMany('id', 'Products', 'supplier_id', array(
            'foreignKey' => array(
                'message' => 'Supplier cannot be deleted because it\'s used in Products'
            )
        ));
    }
}