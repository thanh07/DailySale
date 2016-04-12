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
use Phalcon\Mvc\Model\Relation;
//use dailysale\models\Products as Products;
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
     * Category initializer
     */
    public function initialize()
    {
        $this->hasMany('id', 'dailysale\Models\Products', 'category_id', array(
            'foreignKey' => array(
//                "action" => Relation::ACTION_CASCADE,
                'message' => 'Category cannot be deleted because it\'s used in Products'
            )
        ));
    }

}