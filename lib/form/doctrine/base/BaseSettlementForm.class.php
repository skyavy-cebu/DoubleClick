<?php

/**
 * Settlement form base class.
 *
 * @method Settlement getObject() Returns the current form's model object
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSettlementForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'status'     => new sfWidgetFormChoice(array('choices' => array(0 => '0', 1 => '1', 2 => '2', 3 => '3'))),
      'price'      => new sfWidgetFormInputText(),
      'paid_at'    => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'status'     => new sfValidatorChoice(array('choices' => array(0 => '0', 1 => '1', 2 => '2', 3 => '3'), 'required' => false)),
      'price'      => new sfValidatorNumber(array('required' => false)),
      'paid_at'    => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(),
      'created_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('settlement[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Settlement';
  }

}
