<?php

/**
 * Subscription form.
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SubscriptionForm extends BaseSubscriptionForm
{
  public function setup()
  {
    parent::setup();
    
    $isActiveChoice = array('Active', 'Inactive');
    
    $this->setWidget('is_active', new sfWidgetFormSelect(array('choices' => $isActiveChoice)));
    $this->setValidator('is_active', new sfValidatorChoice(array('choices' => $isActiveChoice)));
  }
}
