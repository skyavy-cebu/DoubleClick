<?php

/**
 * Teacher form base class.
 *
 * @method Teacher getObject() Returns the current form's model object
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTeacherForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'title'           => new sfWidgetFormInputText(),
      'email'           => new sfWidgetFormInputText(),
      'password'        => new sfWidgetFormInputText(),
      'sender_email'    => new sfWidgetFormInputText(),
      'portfolio'       => new sfWidgetFormTextarea(),
      'details'         => new sfWidgetFormTextarea(),
      'picture'         => new sfWidgetFormInputText(),
      'change_password' => new sfWidgetFormInputText(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'created_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'           => new sfValidatorString(array('max_length' => 100)),
      'email'           => new sfValidatorString(array('max_length' => 80)),
      'password'        => new sfValidatorString(array('max_length' => 50)),
      'sender_email'    => new sfValidatorString(array('max_length' => 80)),
      'portfolio'       => new sfValidatorString(array('required' => false)),
      'details'         => new sfValidatorString(array('required' => false)),
      'picture'         => new sfValidatorString(array('max_length' => 42, 'required' => false)),
      'change_password' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'updated_at'      => new sfValidatorDateTime(),
      'created_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('teacher[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Teacher';
  }

}
