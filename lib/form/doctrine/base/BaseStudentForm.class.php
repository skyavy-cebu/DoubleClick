<?php

/**
 * Student form base class.
 *
 * @method Student getObject() Returns the current form's model object
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStudentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'furigana'   => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'password'   => new sfWidgetFormInputText(),
      'status'     => new sfWidgetFormChoice(array('choices' => array(0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4'))),
      'login_type' => new sfWidgetFormChoice(array('choices' => array(0 => '0', 1 => '1'))),
      'zipcode1'   => new sfWidgetFormInputText(),
      'zipcode2'   => new sfWidgetFormInputText(),
      'state_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('State'), 'add_empty' => false)),
      'city_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'add_empty' => true)),
      'address'    => new sfWidgetFormInputText(),
      'contact'    => new sfWidgetFormInputText(),
      'picture'    => new sfWidgetFormInputText(),
      'activation' => new sfWidgetFormInputText(),
      'updated_at' => new sfWidgetFormDateTime(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 100)),
      'furigana'   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 80)),
      'password'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'status'     => new sfValidatorChoice(array('choices' => array(0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4'), 'required' => false)),
      'login_type' => new sfValidatorChoice(array('choices' => array(0 => '0', 1 => '1'), 'required' => false)),
      'zipcode1'   => new sfValidatorString(array('max_length' => 3, 'required' => false)),
      'zipcode2'   => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'state_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('State'))),
      'city_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'required' => false)),
      'address'    => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'contact'    => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'picture'    => new sfValidatorString(array('max_length' => 42, 'required' => false)),
      'activation' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'updated_at' => new sfValidatorDateTime(),
      'created_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('student[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Student';
  }

}
