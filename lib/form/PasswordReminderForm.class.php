<?php

/**
 * Register form.
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Jane Lois E. de Veyra
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PasswordReminderForm extends BaseForm
{
  public function configure()
  {
    $this->setWidget('email', new sfWidgetFormInputText());
    $this->setValidator('email', new sfValidatorEmail(array('required' => true)));
    
    $this->mergePostValidator(new sfValidatorCallback(array('callback' => array($this, 'checkUserStatus'))));
    
    $this->widgetSchema->setNameFormat('password-reminder[%s]');
  }
  
  /**
   * Check if the Student exists and is active.
   *
   * @param $validator
   * @param $values
   */
  public function checkUserStatus($validator, $values)
  {
    $oStudent = StudentTable::getInstance()->findOneByEmail($values['email']);
    if (!$oStudent)
    {
			throw new sfValidatorErrorSchema($validator, array('email' => new sfValidatorError($validator, 'Email is not registered to any Student')));
    }
    else
    {
      $errorMessage = '';
      switch ($oStudent->getStatus())
      {
        case 0: $errorMessage = 'The account requires activation. Please check your mail for the activation link.'; break;
        case 1: break;
        case 2: $errorMessage = 'The account has been deactivated.'; break;
        case 3: $errorMessage = 'The account has been deleted.'; break;
        case 4: break;
      }
      
      if ('' != $errorMessage)
      {
        throw new sfValidatorErrorSchema($validator, array('email' => new sfValidatorError($validator, $errorMessage)));
      }
    }
  }
}
