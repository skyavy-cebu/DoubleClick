<?php

/**
 * Search Student form.
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Jane Lois E. de Veyra
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SearchStudentForm extends BaseForm
{
  public function configure()
  {
    $statusChoices = array('Pending', 'Active', 'Deactivated', 'Deleted', 'Expired Subscription');
    
    $this->setWidgets(array(
      'name'   => new sfWidgetFormInputText(),
      'email'  => new sfWidgetFormInputText(array('label' => 'Email')),
      'status' => new sfWidgetFormSelect(array('label' => 'Status', 'choices' => array(-1 => 'Please select...') + $statusChoices))
    ));
    
    $this->setValidators(array(
      'name'   => new sfValidatorPass(),
      'email'  => new sfValidatorPass(),
      'status' => new sfValidatorPass()
    ));
    
    $this->disableLocalCSRFProtection();
  }
}
