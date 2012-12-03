<?php

/**
 * Teacher form.
 *
 */
class TeacherPortfolioForm extends BaseForm
{
  public function configure()
  {
    
    $this->setWidgets(array(
      'portfolio'      => new sfWidgetFormInputText(array('label' => 'Portfolio')),
      'details'     => new sfWidgetFormTextarea(array('label' => 'Detail'))
    ));
    
    $this->setValidators(array(
      'portfolio'      => new sfValidatorString(array('required' => true)),
      'details'     => new sfValidatorString(array('required' => true))
    ));
       
    $this->widgetSchema->setNameFormat('teacherPortfolio[%s]');
  }
  
}
