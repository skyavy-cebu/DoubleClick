<?php

/**
 * TeacherSubscriptionPlans form.
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Jane Lois E. de Veyra
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TeacherSubscriptionPlansForm extends BaseForm
{
  public function configure()
  {
    $teacher = TeacherTable::getInstance()->find($this->getOption('teacher_id'));
    
    $subsPlansArr = SubscriptionPlanTable::getInstance()->createQuery('sbp')
      ->where('sbp.teacher_id = ?', $teacher->getId())
      ->orderBy('sbp.duration ASC')
      ->execute();
    
    $subsPlansChoices = array();
    foreach ($subsPlansArr as $subsPlan)
    {
      $subsPlansChoices[$subsPlan->getId()] = $subsPlan->getName() . ' (' . $subsPlan->getDuration() . ' month(s) at ' . $subsPlan->getPrice() . '円)';
    }
  
    $this->setWidget('subs_plans', new sfWidgetFormChoice(array(
                                    'label'    => $teacher->getTitle(),
                                    'expanded' => true,
                                    'multiple' => false,
                                    'choices'  => $subsPlansChoices
                              ))
    );
    
    $this->setValidator('subs_plans', new sfValidatorPass());
    
    $this->widgetSchema->setNameFormat('teacher_subscription_plans[%s]');
  }
}