<?php

/**
 * Login form.
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Jane Lois E. de Veyra
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LoginForm extends BaseForm
{
  public function configure()
  {
    // '' (Student) or 'teacher' (Teacher)
    $this->userType = $this->getOption('userType');

    $this->setWidgets(array(
      'email'       => new sfWidgetFormInputText(array('label' => 'Email')),
      'password'    => new sfWidgetFormInputPassword(array('label' => 'Password')),
      'remember_me' => new sfWidgetFormInputCheckbox(array('label' => 'Remember Me')),
    ));
    
    $this->setValidators(array(
      'email'       => new sfValidatorEmail(array('required' => true)),
      'password'    => new sfValidatorString(array('required' => true)),
      'remember_me' => new sfValidatorPass()
    ));
    
    $this->mergePostValidator(new sfValidatorCallback(array('callback' => array($this, 'checkLoginCredentials'))));
    
    $this->widgetSchema->setNameFormat('login[%s]');
  }
  
  /**
   * Checks if the email exists and the password is correct.
   * Checks if the status is active when user is a Student.
   *
   * @param $validator
   * @param $values
   */
  public function checkLoginCredentials($validator, $values)
  {
    // check if User exists
    if ('admin' == $this->userType)
    {
      $oUser = AdminTable::getInstance()->findOneByEmail($values['email']);
      $emailErrorMsg = 'Email is not assigned to any Admin User';
    }
    else if ('teacher' == $this->userType)
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
      // check password
      if ($oUser->getPassword() != md5(md5($values['password']).sfConfig::get('app_system_salt')))
      {
        throw new sfValidatorErrorSchema($validator, array('password' => new sfValidatorError($validator, 'Incorrect password.')));
      }
      
      // if Student, check status
      if ('' == $this->userType)
      {
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
