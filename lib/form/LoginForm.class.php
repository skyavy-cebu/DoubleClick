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
    $this->setWidgets(array(
      'email'       => new sfWidgetFormInputText(array('label' => 'Email')),
      'password'    => new sfWidgetFormInputPassword(array('label' => 'Password')),
      'remenber_me' => new sfWidgetFormInputCheckbox(array('label' => 'Remeber Me')),
    ));
    
    $this->setValidators(array(
      'email'    => new sfValidatorEmail(array('required' => true)),
      'password' => new sfValidatorString(array('required' => true))
    ));
    
    $this->mergePostValidator(new sfValidatorCallback(array('callback' => array($this, 'checkLoginCredentials'))));
    
    $this->widgetSchema->setNameFormat('register[%s]');
  }
  
  /**
   * Checks if the email exists and the password is correct.
   *
   * @param $validator
   * @param $values
   */
  public function checkUniqueEmail($validator, $values)
  {
    $oStudent = StudentTable::getInstance()->findOneByEmail($values['email']);
    if (!$oStudent)
    {
			throw new sfValidatorErrorSchema($validator, array('email' => new sfValidatorError($validator, 'Email is not registered to any Student')));
    }
    else
    {
      if ($oStudent->getPassword() != md5(md5($values['password']).sfConfig::get('app_system_salt')))
      {
        throw new sfValidatorErrorSchema($validator, array('password' => new sfValidatorError($validator, 'Incorrect password.')));
      }
    }
  }
}
