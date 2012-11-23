<?php

/**
 * AddSubscription form.
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Jane Lois E. de Veyra
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AddSubscriptionForm extends BaseForm
{
  public function configure()
  {
    // Subscription required
    $this->mergePostValidator(new sfValidatorCallback(array('callback' => array($this, 'checkRequiredSubscription'))));
    
    // embed forms for subscription application (TeacherSubscriptionPlansForm)
    $student = StudentTable::getInstance()->find($this->getOption('student_id'));
    $teachers = $student->getAvailableTeachersToSubscribeTo();
    
    $subsPlansForm = new sfForm();
    foreach ($teachers as $teacher)
    {
      $subsPlansForm->embedForm($teacher['id'], new TeacherSubscriptionPlansForm(null, array('teacher_id' => $teacher['id'])));
    }
    $this->embedForm('subscription_plans', $subsPlansForm);

    $this->widgetSchema->setNameFormat('subscription[%s]');
  }
  
  /**
   * Checks if the Student has selected at least one SubscriptionPlan.
   *
   * @param $validator
   * @param $values
   */
  public function checkRequiredSubscription($validator, $values)
  {
    $hasSubscribed = false;
    foreach ($values['subscription_plans'] as $teacherId => $subscriptionPlan)
    {
      if (!is_null($subscriptionPlan['subs_plans']))
      {
        $hasSubscribed = true;
        break;
      }
    }
    
    if (!$hasSubscribed)
    {
      throw new sfValidatorError($validator, 'Select at least one Subscription Plan.');
    }
  }
}
