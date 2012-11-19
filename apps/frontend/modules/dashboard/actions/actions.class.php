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
 public function executeIndex(sfWebRequest $request)
  {
    $this->teacherslist = Doctrine_Core::getTable('Teacher')->getTeachers();
    $this->studentteachers = Doctrine_Core::getTable('Teacher')->getStudentTeachers();
    $this->studentforsubscribeteachers = Doctrine_Core::getTable('Teacher')->getStudentForSubscribeTeachers();
    $this->studentnewsletters = Doctrine_Core::getTable('NewsletterXStudent')->getStudentNewsletters();
  }
  public function executeShow(sfWebRequest $request)
  {
    $this->teacherslist = Doctrine_Core::getTable('Teacher')->getTeachers();
    $this->studentnewsletters = Doctrine_Core::getTable('NewsletterXStudent')->getStudentNewsletters();
    $this->newsletters = Doctrine::getTable('Newsletter')-> find($request->getParameter('id'));
    $this->forward404Unless($this->newsletters);
  }
  public function executeList(sfWebRequest $request)
  {
    $this->teacherslist = Doctrine_Core::getTable('Teacher')->getTeachers();
    $this->studentnewsletters = Doctrine_Core::getTable('NewsletterXStudent')->getStudentNewsletters();
    $this->studentteachers = Doctrine_Core::getTable('Teacher')->getStudentTeachers();
    $this->studentforsubscribeteachers = Doctrine_Core::getTable('Teacher')->getStudentForSubscribeTeachers();
    $this->teacher = Doctrine::getTable('Teacher')-> find($request->getParameter('id'));
    $this->forward404Unless($this->teacher);
  }
}
