<?php

/**
 * student actions.
 *
 * @package    DOUBLECLICK
 * @subpackage student
 * @author     Jane Lois E. de Veyra
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class studentActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward404Unless($this->getUser()->isAuthenticated(), 'Please login to continue.');
    
    $this->searchForm = new SearchStudentForm();
    
    // set search parameters
    $searchStudentParams = array();
    if ($searchName = $request->getParameter('name'))
    {
      $searchStudentParams['name'] = $searchName;
    }
    if ($searchEmail = $request->getParameter('email'))
    {
      $searchStudentParams['email'] = $searchEmail;
    }
    $searchStatus = $request->getParameter('status'); // can have value = 0
    if (-1 < $searchStatus)
    {
      $searchStudentParams['status'] = $searchStatus;
    }
    
    $this->searchForm->bind($searchStudentParams);
    
    $query = StudentTable::getInstance()->getByOptionsQuery($searchStudentParams);
    $alias = $query->getRootAlias();
    
    $query->leftJoin("$alias.Subscription sub1")
      ->addWhere("EXISTS (SELECT sub2.id, sub2.valid_until FROM Subscription sub2 WHERE sub2.id=sub1.id GROUP BY sub2.student_id HAVING(MAX(sub2.valid_until) OR sub2.valid_until IS NULL))")
      ->orderBy("sub1.valid_until ASC, $alias.created_at ASC");
    
    $this->pager = new sfDoctrinePager('Student', sfConfig::get('app_search_user_per_page'));
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
  
 /**
  * Executes view action
  *
  * @param sfRequest $request A request object
  */
  public function executeView(sfWebRequest $request)
  {
    $this->forward404Unless($this->getUser()->isAuthenticated(), 'Please login to continue.');
  }
}
