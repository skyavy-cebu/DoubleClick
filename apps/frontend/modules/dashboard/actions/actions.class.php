<?php

/**
 * subscription actions.
 *
 * @package    DOUBLECLICK
 * @subpackage subscription
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
 /* public function executeIndex(sfWebRequest $request)
  {
     $q = Doctrine_Query::create()
      ->from('Subscription s')
      ->where('s.valid_until > ?', date('Y-m-d H:i:s', time()));
   
    $this->active_newsletter = $q->execute();
  }*/
 public function executeIndex(sfWebRequest $request)
  {
    $this->teacherslist = Doctrine_Core::getTable('Teacher')->getTeachers();
    $this->teachers = Doctrine_Core::getTable('Teacher')->getNewsletters();
    $this->teachernewsletters = Doctrine_Core::getTable('Teacher')->getTeacherNewsletters();
    $this->studentnewsletters = Doctrine_Core::getTable('NewsletterXStudent')->getStudentNewsletters();
    $this->studentteachers = Doctrine_Core::getTable('Student')->getStudentTeachers();
  }
  public function executeShow(sfWebRequest $request)
  {
    $this->newsletters = Doctrine::getTable('Newsletter')-> find($request->getParameter('id'));
    $this->forward404Unless($this->newsletters);
  }
}
