<?php
/**
 * Created by PhpStorm.
 * User: lttun
 * Date: 4/9/2016
 * Time: 2:45 PM
 */

namespace dailysale\Forms;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
//use dailysale\Models\Profiles;

class CategoryForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        if (isset($options['edit']) && $options['edit']) {
            $id = new Hidden('id');
        } else {
            $id = new Text('id');
        }

        $this->add($id);

        $name = new Text('name', array(
            'placeholder' => 'Category Name'
        ));

        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'The Category name is required'
            ))
        ));

        $this->add($name);

    }

}