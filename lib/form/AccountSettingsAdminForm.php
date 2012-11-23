<?php

/**
 * Account Settings form.
 *
 */
class AccountSettingsAdminForm extends BaseForm
{
  public function configure()
  {
    
    $this->setWidgets(array(
      'name'      => new sfWidgetFormInputText(array('label' => 'Username')),
      'password'   => new sfWidgetFormInputPassword(array('label' => 'Password')),
      'cpassword'  => new sfWidgetFormInputPassword(array('label' => 'Confirm Password'))
    ));
    
    $this->setValidators(array(
      'name'      => new sfValidatorString(array('required' => true)),
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
          // same password and password confirmation
          new sfValidatorSchemaCompare(
            'password', sfValidatorSchemaCompare::EQUAL, 'cpassword',
            array(), array('invalid' => 'パスワードが一致しません。')),
          // unique email
          new sfValidatorCallback(array('callback' => array($this, 'checkUniqueUsername')))
        )
      )
    );
    
    $this->widgetSchema->setNameFormat('account-settings[%s]');
  }
  
  /**
   * Checks if the name is unique or is not yet assigned to another Admin.
   *
   * @param $validator
   * @param $values
   */
  public function checkUniqueUsername($validator, $values)
  {
    if ('' != trim($values['name']) && AdminTable::getInstance()->findOneByEmail($values['name']))
    {
			throw new sfValidatorErrorSchema($validator, array('name' => new sfValidatorError($validator, 'このメールアドレスはすでに登録済みです。')));
    }
  }
}
