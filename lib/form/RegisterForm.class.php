<?php

/**
 * Register form.
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Danilo M. Nava Jr.
 * @modified   Jane Lois E. de Veyra. 2012-11-13
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RegisterForm extends BaseForm
{
  public function configure()
  {
    $statesArr = StateTable::getInstance()->createQuery()->fetchArray();
    $statesChoice = array('全ての県');
    foreach ($statesArr as $state)
    {
      $statesChoice[$state['id']] = $state['name'];
    }
    
    $teachersArr = TeacherTable::getInstance()->createQuery()->fetchArray();
    $teachersChoice = array();
    foreach ($teachersArr as $teacher)
    {
      $teachersChoice[$teacher['id']] = $teacher['title'];
    }
    
    $this->setWidgets(array(
      'name'       => new sfWidgetFormInputText(),
      'furigana'   => new sfWidgetFormInputText(),
      'zipcode1'   => new sfWidgetFormInputText(),
      'zipcode2'   => new sfWidgetFormInputText(),
      'state_id'   => new sfWidgetFormSelect(array('choices' => $statesChoice)),
      'address'    => new sfWidgetFormInputText(),
      'contact'    => new sfWidgetFormInputText(array('label' => 'Contact Info')),
      'email'      => new sfWidgetFormInputText(array('label' => 'Email')),
      'cemail'     => new sfWidgetFormInputText(array('label' => 'Confirm Email')),
      'password'   => new sfWidgetFormInputPassword(array('label' => 'Password')),
      'cpassword'  => new sfWidgetFormInputPassword(array('label' => 'Confirm Password')),
      'duration'   => new sfWidgetFormChoice(array(
                      'label' => 'Courses',
                      'expanded' => true,
                      'multiple' => false,
                      'choices' => array('1ヶ月コース', '3ヶ月コース', '6ヶ月コース')
                     )),
      'teacher_id' => new sfWidgetFormChoice(array(
                      'label' => 'Teachers',
                      'expanded' => true,
                      'multiple' => true,
                      'choices' => $teachersChoice
                     ))
    ));
    
    $this->setValidators(array(
      'name'       => new sfValidatorString(array('required' => true)),
      'furigana'   => new sfValidatorString(array('required' => true)),
      'zipcode1'   => new sfValidatorString(array('required' => true)),
      'zipcode2'   => new sfValidatorString(array('required' => true)),
      'state_id'   => new sfValidatorChoice(array('choices' => array_slice(array_keys($statesChoice), 1, count($statesArr)))),
      'address'    => new sfValidatorString(array('required' => true)),
      'contact'    => new sfValidatorString(array('required' => true)),
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
      'cpassword'  => new sfValidatorString(array('required' => true)),
      'duration'   => new sfValidatorChoice(array('choices' => array('0', '1', '2'))),
      'teacher_id' => new sfValidatorChoice(array('choices' => array_keys($teachersChoice), 'multiple' => true))
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
    
    $this->widgetSchema->setNameFormat('register[%s]');
  }
  
  /**
   * Checks if the email is unique or is not yet assigned to another Student.
   *
   * @param $validator
   * @param $values
   */
  public function checkUniqueEmail($validator, $values)
  {
    if ('' != trim($values['email']) && StudentTable::getInstance()->findOneByEmail($values['email']))
    {
			throw new sfValidatorErrorSchema($validator, array('email' => new sfValidatorError($validator, 'このメールアドレスはすでに登録済みです。')));
    }
  }
}
