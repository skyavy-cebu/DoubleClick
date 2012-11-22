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
   * Executes student action
   *
   * @param sfRequest $request A request object
   */
  public function executeStudent(sfWebRequest $request)
  {
    $this->forward404Unless($this->getUser()->isAuthenticated(), 'Please login to continue.');
    $this->forward404Unless('student' == $this->getUser()->getAttribute('user_type', '', 'doubleclick_frontend'), 'User must be a Student.');
    
    $this->subscriptions = $this->getUser()->getDetails()->getSubscriptions();
  }
  
  /**
   * Executes add action
   *
   * @param sfRequest $request A request object
   */
  public function executeAdd(sfWebRequest $request)
  {
    $this->forward404Unless($this->getUser()->isAuthenticated());
    $this->forward404Unless('student' == $this->getUser()->getAttribute('user_type', '', 'doubleclick_frontend'));
    
    // $this->form = new AddSubscriptionForm();
  }
}