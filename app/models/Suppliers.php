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
    /**
     * @var string
     */
    public $contact_name;
    /**
     * @var string
     */
    public $address;
    /**
     * @var string
     */
    public $city;
    public $phone;

    /**
     * Suppliers initializer
     */
    public function initialize()
    {
        $this->hasMany('id', 'dailysale\Models\Products', 'supplier_id', array(
            'foreignKey' => array(
                'message' => 'Supplier cannot be deleted because it\'s used in Products'
            )
        ));
    }
}