<?php

/**
 * Student form.
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StudentForm extends BaseStudentForm
{
  public function setup()
  {
    parent::setup();
    
    $statusChoice = array('Pending', 'Active', 'Deactivated', 'Deleted');
    
    $this->setWidget('status', new sfWidgetFormSelect(array('choices' => $statusChoice)));
    $this->setValidator('status', new sfValidatorChoice(array('choices' => $statusChoice)));
  }
}
