<?php

/**
 * Account Settings form.
 *
 */
class AccountSettingsForm extends BaseForm
{
  public function configure()
  {
    
    $this->setWidgets(array(
      'email'      => new sfWidgetFormInputText(array('label' => 'Email')),
      'cemail'     => new sfWidgetFormInputText(array('label' => 'Confirm Email')),
      'password'   => new sfWidgetFormInputPassword(array('label' => 'Password')),
      'cpassword'  => new sfWidgetFormInputPassword(array('label' => 'Confirm Password'))
    ));
    
    $this->setValidators(array(
      'email'      => new sfValidatorEmail(array('required' => true)),
      'cemail'     => new sfValidatorEmail(array('required' => true)),
      'password'   => new sfValidatorString(
                        array(
                          'required' => true,
                          'min_length' => 8,
                          'max_length' => 16),
                        array(
                          'min_length' => '8-16 alphanumeric characters.',
                          'max_length' => '8-16 alphanumeric characters.'
                        )
                      ),
      'cpassword'  => new sfValidatorString(array('required' => true))
    ));
    
    $this->mergePostValidator(
      new sfValidatorAnd(
        array(
          // same email and email confirmation
          new sfValidatorSchemaCompare(
            'email', sfValidatorSchemaCompare::EQUAL, 'cemail',
            array(), array('invalid' => '電子メールは一致しません。')),
          // same password and password confirmation
          new sfValidatorSchemaCompare(
            'password', sfValidatorSchemaCompare::EQUAL, 'cpassword',
            array(), array('invalid' => 'パスワードが一致しません。')),
          // unique email
          new sfValidatorCallback(array('callback' => array($this, 'checkUniqueEmail')))
        )
      )
    );
    
    $this->widgetSchema->setNameFormat('account-settings[%s]');
  }
  
  /**
   * Checks if the email is unique or is not yet assigned to another Student.
   *
   * @param $validator
   * @param $values
   */
  public function checkUniqueEmail($validator, $values)
  {
    if ('' != trim($values['email']) && TeacherTable::getInstance()->findOneByEmail($values['email']))
    {
			throw new sfValidatorErrorSchema($validator, array('email' => new sfValidatorError($validator, 'このメールアドレスはすでに登録済みです。')));
    }
  }
}
