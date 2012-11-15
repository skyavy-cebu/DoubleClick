<?php

/**
 * Register form.
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Jane Lois E. de Veyra
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ChangePasswordForm extends BaseForm
{
  public function configure()
  {
    $this->oStudent = StudentTable::getInstance()->findOneByActivation($this->getOption('code'));
    
    $this->setWidgets(array(
      'oldpassword'   => new sfWidgetFormInputPassword(array('label' => 'Old Password')),
      'newpassword'   => new sfWidgetFormInputPassword(array('label' => 'New Password')),
      'cnewpassword'  => new sfWidgetFormInputPassword(array('label' => 'Confirm New Password')),
    ));
    
    $this->setValidators(array(
      'oldpassword'  => new sfValidatorString(array('required' => true)),
      'newpassword'  => new sfValidatorString(
                          array(
                            'required' => true,
                            'min_length' => 8,
                            'max_length' => 16),
                          array(
                            'min_length' => '8-16 alphanumeric characters.',
                            'max_length' => '8-16 alphanumeric characters.'
                          )
                        ),
      'cnewpassword' => new sfValidatorString(array('required' => true)),
    ));
    
    $this->mergePostValidator(
      new sfValidatorAnd(
        array(
          // correct password
          new sfValidatorCallback(array('callback' => array($this, 'checkPassword'))),
          // same password and password confirmation
          new sfValidatorSchemaCompare(
            'newpassword', sfValidatorSchemaCompare::EQUAL, 'cnewpassword',
            array(), array('invalid' => 'パスワードが一致しません。'))
        )
      )
    );
    
    $this->widgetSchema->setNameFormat('change-password[%s]');
  }
  
  /**
   * Checks if the password is correct.
   *
   * @param $validator
   * @param $values
   */
  public function checkPassword($validator, $values)
  {
    if ($this->oStudent->getPassword() != md5(md5($values['oldpassword']).sfConfig::get('app_system_salt')))
    {
			throw new sfValidatorErrorSchema($validator, array('oldpassword' => new sfValidatorError($validator, 'Incorrect password.')));
    }
  }
}
