<?php
/**
 * Created by PhpStorm.
 * User: lttun
 * Date: 4/10/2016
 * Time: 1:52 PM
 */
namespace dailysale\Forms;


use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\ExclusionIn;
use dailysale\Models\Suppliers;
use dailysale\Models\Category;

class ProductsForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        // In edition the id is hidden
        if (isset($options['edit']) && $options['edit']) {
            $id = new Hidden('id');
        } else {
            $id = new Text('id');
        }

        $this->add($id);

        $name = new Text('name', array(
            'placeholder' => 'Product name'
        ));

        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'The Product name is required'
            ))
        ));

        $this->add($name);
//        $this->add(new Select('category_id', Category::find(), array(
//            'using' => array(
//                'id',
//                'name'
//            ),
//            'useEmpty' => true,
//            'emptyText' => '...',
//            'emptyValue' => ''
//        )));
        $category = new Select('category_id', Category::find(), array(
            'using'      => array('id', 'name')
           ));
        $category->addValidator(new ExclusionIn(array(
            'message' => 'The category must be 0',
            'domain' => array('...'))));
//        $category->setDefault(1);
//        $category->setLabel('Category');
        $this->add($category);

        $supplier = new Select('supplier_id', Suppliers::find(), array(
            'using'      => array('id', 'name'),
            'useEmpty'   => true,
            'emptyText'  => '...',
            'emptyValue' => ''
        ));
//        $category->setLabel('Supplier');
        $this->add($supplier);
//
        $price = new Numeric("price",array(
        'placeholder' => '$0.0'
    ));
        $price->setLabel("Price");
        $price->setFilters(array('float'));
        $price->addValidators(array(
            new PresenceOf(array(
                'message' => 'Price is required'
            )),
            new Numericality(array(
                'message' => 'Price is required'
            ))
        ));
        $this->add($price);
//
        $purchase_price = new Text("purchase_price", array(
            'placeholder' => '$0.0'
        ));

        $purchase_price->setLabel("Purchase Price");
        $purchase_price->setFilters(array('float'));
        $purchase_price->addValidators(array(
            new PresenceOf(array(
                'message' => 'Purchase price is required'
            )),
            new Numericality(array(
                'message' => 'Purchase Price is required'
            ))
        ));
        $this->add($purchase_price);
        $this->add(new Select('active', array(
            'Y' => 'Yes',
            'N' => 'No'
        )));
    }
}
