<?php

/**
 * Register form.
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Danilo M. Nava Jr.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RegisterForm extends BaseForm
{
  public function configure()
  {
    $q = Doctrine_Query::create()->from('State s');
    $states_orig = $q->fetchArray();
    $states = array('Please select a state');
    
    foreach ($states_orig as $s)
      $states[] = $s['name'];
    
    $this->setWidgets(array(
      'name'      => new sfWidgetFormInputText(),
      'furigana'  => new sfWidgetFormInputText(),
      'zipcode'   => new sfWidgetFormInputText(),
      'state'     => new sfWidgetFormSelect(array('choices'=>$states)),
      'address'   => new sfWidgetFormInputText(),
      'contact'   => new sfWidgetFormInputText(),
      'email'     => new sfWidgetFormInputText(),
      'cemail'    => new sfWidgetFormInputText(),
      'password'  => new sfWidgetFormInputPassword(),
      'cpassword' => new sfWidgetFormInputPassword(),
    ));
    
    $this->setValidators(array(
      'name'      => new sfValidatorString(array('required'=>true)),
      'furigana'  => new sfValidatorString(array('required'=>false)),
      'zipcode'   => new sfValidatorString(array('required'=>false)),
      'state'     => new sfValidatorChoice(array('choices'=>array_keys($states))),
      'address'   => new sfValidatorString(array('required'=>false)),
      'contact'   => new sfValidatorString(array('required'=>false)),
      'email'     => new sfValidatorString(array('required'=>true)),
      'cemail'    => new sfValidatorString(array('required'=>true)),
      'password'  => new sfValidatorString(array('required'=>true)),
      'cpassword' => new sfValidatorString(array('required'=>true)),
    ));
    
    $this->mergePostValidator(
      new sfValidatorAnd(
        array(
          new sfValidatorSchemaCompare('email', sfValidatorSchemaCompare::EQUAL, 'cemail', array(), array('invalid' => 'Email must match.')),
          new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'cpassword', array(), array('invalid' => 'Password must match.'))
        )
      )
    );
    
    $this->widgetSchema->setNameFormat('register[%s]');
  }
}
