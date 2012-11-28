<?php

/**
 * PasswordReminder form.
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
    $this->userType = $this->getOption('userType');
    
    $this->setWidget('email', new sfWidgetFormInputText());
    $this->setValidator('email', new sfValidatorEmail(array('required' => true)));
    
    $this->mergePostValidator(new sfValidatorCallback(array('callback' => array($this, 'checkUserStatus'))));
    
    $this->widgetSchema->setNameFormat('password-reminder[%s]');
  }
  
  /**
   * Check if the Student or Teacher exists and is active.
   *
   * @param $validator
   * @param $values
   */
  public function checkUserStatus($validator, $values)
  {
    if ('teacher' == $this->userType)
    {
      $oUser = TeacherTable::getInstance()->findOneByEmail($values['email']);
      $emailErrorMsg = 'Email is not assigned to any Teacher';
    }
    else
    {
      $oUser = StudentTable::getInstance()->findOneByEmail($values['email']);
      $emailErrorMsg = 'Email is not registered to any Student';
    }
    
    if (!$oUser)
    {
			throw new sfValidatorErrorSchema($validator, array('email' => new sfValidatorError($validator, $emailErrorMsg)));
    }
    else
    {
      if ('' == $this->userType)
      {
        $statusErrorMsg = '';
        switch ($oUser->getStatus())
        {
          case 0: $statusErrorMsg = 'The account requires activation. Please check your mail for the activation link.'; break;
          case 1: break;
          case 2: $statusErrorMsg = 'The account has been deactivated.'; break;
          case 3: $statusErrorMsg = 'The account has been deleted.'; break;
          case 4: break;
        }
        
        if ('' != $statusErrorMsg)
        {
          throw new sfValidatorErrorSchema($validator, array('email' => new sfValidatorError($validator, $statusErrorMsg)));
        }
      }
    }
  }
}
