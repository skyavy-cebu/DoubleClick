<?php

/**
 * settlement actions.
 *
 * @package    DOUBLECLICK
 * @subpackage settlement
 * @author     Jane Lois E. de Veyra
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class settlementActions extends sfActions
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
    $this->forward404Unless($settlement = SettlementTable::getInstance()->find($request->getParameter('id')), 'No Settlement');
    $this->forward404Unless($changeSettlementStatus = $request->getParameter('change_settlement_status'), 'Missing parameters');
    
    $settlement->setStatus($changeSettlementStatus['status']);
    if ('1' == $changeSettlementStatus['status'])
    {
      $settlement->setPaidAt(date('Y-m-d H:i:s'));
      
      // set Subscriptions in this Settlement to active
      foreach ($settlement->getSubscription() as $subscription)
      {
        $subscription->setIsActive(1);
        $subscription->save();
      }
    }
    $settlement->save();
    
    $this->redirect('@student-subscriptions?id=' . $settlement->getSubscription()->getFirst()->getStudentId());
  }
}
