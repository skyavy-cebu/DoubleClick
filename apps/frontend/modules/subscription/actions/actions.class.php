<?php

/**
 * subscription actions.
 *
 * @package    DOUBLECLICK
 * @subpackage subscription
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */

class subscriptionActions extends sfActions
{
  /**
   * Executes add action
   *
   * @param sfRequest $request A request object
   */
  public function executeAdd(sfWebRequest $request)
  {
    $this->forward404Unless($this->getUser()->isAuthenticated(), 'Please login to continue.');
    $this->forward404Unless('student' == $this->getUser()->getAttribute('user_type', '', 'doubleclick_frontend'), 'User must be a Student.');
    
    $studentId = $this->getUser()->getDetails()->getId();
    $this->hasAvailableTeachersToSubscribeTo = (0 < count($this->getUser()->getDetails()->getAvailableTeachersToSubscribeTo()));
    
    $this->form = new AddSubscriptionForm(null, array('student_id' => $studentId));
    
    if ($request->isMethod('post'))
    {
      $subscription = $request->getParameter($this->form->getName());
      $this->form->bind($subscription);
      
      if ($this->form->isValid())
      {
        // save new Settlement (temporary)
        $settlement = new Settlement();
        $settlement->save();
        
        // save new Subscriptions
        $totalPrice = 0;
        foreach ($subscription['subscription_plans'] as $teacherId => $subscriptionPlanIds)
        {
          $subscriptionPlan = SubscriptionPlanTable::getInstance()->find($subscriptionPlanIds['subs_plans']);
          
          $subscription = new Subscription();
          $subscription->setStudentId($studentId);
          $subscription->setSubscriptionPlanId($subscriptionPlan->getId());
          $subscription->setSettlementId($settlement->getId());
          $subscription->save();
          
          $totalPrice += $subscriptionPlan->getPrice();
        }
        
        // set Settlement price
        $settlement->setPrice($totalPrice);
        $settlement->save();
      
        // send activation mail
        $message = $this->getMailer()->compose(
          /* from */
          array('admin@doubleclick.co.jp' => 'DoubleClick Admin'),
          /* to */
          $this->getUser()->getDetail()->getEmail(),
          /* subject */
          'サブスクリプション',
          /* body */
          <<<EOF
You have successfully applied for new courses.

** Other info goes here **

-------------------------------
DoubleClick
{$this->getController()->genUrl('@home', true)}
EOF
        );
        
        $this->getMailer()->send($message);
        
        $this->redirect('@student-subscriptions');
      }
    }
  }
}