<?php

/**
 * auth actions.
 *
 * @package    DOUBLECLICK
 * @subpackage teacher
 * @author     Jane Lois E. de Veyra
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class teacherActions extends sfActions
{
 /**
  * Executes students list action
  *
  * @param sfRequest $request A request object
  */
  public function executeStudentsList(sfWebRequest $request)
  {
    $this->forward404Unless($this->getUser()->isAuthenticated());
    
    $this->searchForm = new SearchStudentForm();
    $searchStudentParams = array('name' => $request->getParameter('name'), 'email' => $request->getParameter('email'));
    $this->searchForm->bind($searchStudentParams);
    
    $this->pager = new sfDoctrinePager('Student', sfConfig::get('app_student_search_limit'));
    $this->pager->setQuery(StudentTable::getInstance()->getSubscribedToTeacherQuery($this->getUser()->getDetails()->getId(), $searchStudentParams));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
}