<?php

/**
 * subscription actions.
 *
 * @package    DOUBLECLICK
 * @subpackage subscription
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */

class studentActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
 public function executeDashboard(sfWebRequest $request)
  {
    $this->user = $this->getUser()->getDetails();
    $this->teacherslist = Doctrine_Core::getTable('Teacher')->getTeachers();
    $this->studentteachers = Doctrine_Core::getTable('Teacher')->getStudentTeachers($this->user->getId());
    $this->studentforsubscribeteachers = Doctrine_Core::getTable('Teacher')->getStudentForSubscribeTeachers($this->user->getId());
    $this->studentnewsletters = Doctrine_Core::getTable('NewsletterXStudent')->getStudentNewsletters($this->user->getId());
  }
  public function executeShow(sfWebRequest $request)
  {
    $this->user = $this->getUser()->getDetails();
    $this->teacherslist = Doctrine_Core::getTable('Teacher')->getTeachers();
    $this->studentnewsletters = Doctrine_Core::getTable('NewsletterXStudent')->getStudentNewsletters($this->user->getId());
    $this->newsletters = Doctrine::getTable('Newsletter')-> find($request->getParameter('id'));
    $this->forward404Unless($this->newsletters);
  }
  public function executeList(sfWebRequest $request)
  {
    $this->user = $this->getUser()->getDetails();
    $this->teacherslist = Doctrine_Core::getTable('Teacher')->getTeachers();
    $this->studentnewsletters = Doctrine_Core::getTable('NewsletterXStudent')->getStudentNewsletters($this->user->getId());
   $this->studentteachers = Doctrine_Core::getTable('Teacher')->getStudentTeachers($this->user->getId());
    $this->studentforsubscribeteachers = Doctrine_Core::getTable('Teacher')->getStudentForSubscribeTeachers($this->user->getId());
    $this->teacher = Doctrine::getTable('Teacher')-> find($request->getParameter('id'));
    $this->forward404Unless($this->teacher);
  }
  
  /**
   * Executes subscriptions list action
   *
   * @param sfRequest $request A request object
   */
  public function executeSubscriptionsList(sfWebRequest $request)
  {
    $this->forward404Unless($this->getUser()->isAuthenticated(), 'Please login to continue.');
    $this->forward404Unless('student' == $this->getUser()->getAttribute('user_type', '', 'doubleclick_frontend'), 'User must be a Student.');
    
    $this->subscriptions = $this->getUser()->getDetails()->getSubscriptions();
  }
}
