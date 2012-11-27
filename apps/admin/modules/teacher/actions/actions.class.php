<?php

/**
 * teacher actions.
 *
 * @package    DOUBLECLICK
 * @subpackage teacher
 * @author     Maria Teresa A. Abesa
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class teacherActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward404Unless($this->getUser()->isAuthenticated());
	  $this->teacherslist = Doctrine_Core::getTable('Teacher')->getTeachers();
  }
  
  public function executeNewsletter(sfWebRequest $request)
  {
    $this->teacher = Doctrine_Core::getTable('Teacher')->find(array($request->getParameter('id')));
	  $this->pager = new sfDoctrinePager('Newsletter', sfConfig::get('app_delivered_newsletters_limit'));
    $this->pager->setQuery(NewsletterTable::getInstance()->getNewsletters($request->getParameter('id')));
	
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
	public function executeNewsletterDetail(sfWebRequest $request)
  {
	  $this->newsletter = Doctrine_Core::getTable('Newsletter')->find(array($request->getParameter('id')));
  }
	public function executePortfolio(sfWebRequest $request)
  {
	  $this->teacher = Doctrine_Core::getTable('Teacher')->find(array($request->getParameter('id')));
  }
}
