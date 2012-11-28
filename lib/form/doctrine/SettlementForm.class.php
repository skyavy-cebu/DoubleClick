<?php

/**
 * Settlement form.
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SettlementForm extends BaseSettlementForm
{
  public function setup()
  {
    parent::setup();
    
    $statusChoice = array('Waiting', 'Paid', 'Canceled', 'Declined');
    
    $this->setWidget('status', new sfWidgetFormSelect(array('choices' => $statusChoice)));
    $this->setValidator('status', new sfValidatorChoice(array('choices' => $statusChoice)));
  }
}
