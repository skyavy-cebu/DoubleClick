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
  public function preExecute()
  {
    if (!$this->getUser()->isAuthenticated())
    {
      $this->redirect('@login');
    }
  }
  
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
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
    
    /* Students who have no Subscription approved (is_active) by Admin should be at the top of the list */
    /* The rest will be ordered by the expiration (valid_until) of their LATEST Subscriptions */
    $query = StudentTable::getInstance()->getByOptionsQuery($searchStudentParams);
    $alias = $query->getRootAlias();
    
    $query->leftJoin("$alias.Subscription sub1")
      ->addWhere("EXISTS (SELECT sub2.id, sub2.valid_until FROM Subscription sub2 WHERE sub2.student_id=$alias.id GROUP BY sub2.student_id HAVING(MAX(sub2.valid_until) OR sub2.valid_until IS NULL))")
      ->andWhere("$alias.id=sub1.student_id")
      ->groupBy("$alias.id")
      ->orderBy("sub1.valid_until ASC, $alias.status ASC");
    
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
    $this->forward404Unless($this->student = $this->getRoute()->getObject(), 'Invalid Student.');
  }
  
 /**
  * Executes manage subscriptions action
  *
  * @param sfRequest $request A request object
  */
  public function executeManageSubscriptions(sfWebRequest $request)
  {
    $this->forward404Unless($this->student = $this->getRoute()->getObject(), 'Invalid Student.');
    
    $this->settlements = SettlementTable::getInstance()->getByStudentQuery($this->student->getId())->execute();
  }
  
 /**
  * Executes change status action
  *
  * @param sfRequest $request A request object
  */
  public function executeChangeStatus(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $this->forward404Unless($student = StudentTable::getInstance()->find($request->getParameter('id')), 'No Student');
    $this->forward404Unless($changeStudentStatus = $request->getParameter('change_student_status'), 'Missing parameters');
    
    $student->setStatus($changeStudentStatus['status']);
    $student->save();
    
    $this->redirect('@student-details?id=' . $student->getId());
  }
}
