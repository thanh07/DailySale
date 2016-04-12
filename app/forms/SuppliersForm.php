<?php
/**
 * Created by PhpStorm.
 * User: lttun
 * Date: 4/11/2016
 * Time: 5:10 PM
 */

namespace dailysale\forms;

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
class SuppliersForm extends Form
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
            'placeholder' => 'Supplier name'
        ));

        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'The supplier name is required'
            ))
        ));

        $this->add($name);
        $contact_name = new Text('contact_name', array(
            'placeholder' => 'Contact name'
        ));

        $contact_name->addValidators(array(
            new PresenceOf(array(
                'message' => 'The Contact name is required'
            ))
        ));

        $this->add($contact_name);
        $address = new Text('address', array(
            'placeholder' => 'Address name'
        ));

        $address->addValidators(array(
            new PresenceOf(array(
                'message' => 'The address is required'
            ))
        ));

        $this->add($address);
        $city = new Text('city', array(
            'placeholder' => 'City name'
        ));

        $city->addValidators(array(
            new PresenceOf(array(
                'message' => 'The City name is required'
            ))
        ));

        $this->add($city);
        $phone = new Text('phone', array(
            'placeholder' => 'Phone number'
        ));

        $phone->addValidators(array(
            new PresenceOf(array(
                'message' => 'The phone number is required'
            ))
        ));

        $this->add($phone);
        
    }
}
