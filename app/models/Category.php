<?php
/**
 * Created by PhpStorm.
 * User: lttun
 * Date: 4/9/2016
 * Time: 1:33 PM
 */
namespace dailysale\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\Uniqueness;
class Category extends Model{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * ProductTypes initializer
     */
    public function initialize()
    {
        $this->hasMany('id', 'Products', 'category_id', array(
            'foreignKey' => array(
                'message' => 'Category cannot be deleted because it\'s used in Products'
            )
        ));
    }
}