<?php

/**
 * Subscription form base class.
 *
 * @method Subscription getObject() Returns the current form's model object
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSubscriptionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'student_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Student'), 'add_empty' => false)),
      'subscription_plan_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SubscriptionPlan'), 'add_empty' => false)),
      'settlement_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Settlement'), 'add_empty' => false)),
      'is_active'            => new sfWidgetFormInputText(),
      'valid_until'          => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'created_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'student_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Student'))),
      'subscription_plan_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SubscriptionPlan'))),
      'settlement_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Settlement'))),
      'is_active'            => new sfValidatorInteger(array('required' => false)),
      'valid_until'          => new sfValidatorDateTime(array('required' => false)),
      'updated_at'           => new sfValidatorDateTime(),
      'created_at'           => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('subscription[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Subscription';
  }

}
