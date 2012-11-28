<?php

/**
 * subscription actions.
 *
 * @package    DOUBLECLICK
 * @subpackage subscription
 * @author     Jane Lois E. de Veyra
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class subscriptionActions extends sfActions
{
  public function preExecute()
  {
    if (!$this->getUser()->isAuthenticated())
    {
      $this->redirect('@login');
    }
  }
  
 /**
  * Executes change status action
  *
  * @param sfRequest $request A request object
  */
  public function executeChangeStatus(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $this->forward404Unless($subscription = SubscriptionTable::getInstance()->find($request->getParameter('id')), 'No Subscription');
    $this->forward404Unless($changeSubscriptionStatus = $request->getParameter('change_subscription_status'), 'Missing parameters');
    
    $subscription->setIsActive($changeSubscriptionStatus['is_active']);
    $subscription->save();
    
    $this->redirect('@student-subscriptions?id=' . $subscription->getStudentId());
  }
}
