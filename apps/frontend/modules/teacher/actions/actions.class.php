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
  
      
  /* Teacher's account settings*/
    public function executeAccountSettings(sfWebRequest $request)
  {
    $this->user = $this->getUser()->getDetails();

    $this->forward404Unless($teacher = Doctrine_Core::getTable('teacher')->find(array($this->user->getId()/*$request->getParameter('id')*/)), sprintf('Object newsletter does not exist (%s).', $request->getParameter('id')));
	  /*  $this->teachers = Doctrine_Core::getTable('teacher')->getTeacherAccount($this->user->getId());*/

    $this->form = new AccountSettingsForm();
    
    if ($request->isMethod('post'))
    {
      $accountSettings = $request->getParameter($this->form->getName());
      $this->form->bind($accountSettings);
      
      if ($this->form->isValid())
      {
        $this->getUser()->setAttribute('teacher', $accountSettings);
        $this->redirect('@teacher-account-settings-confirm');
      }
    }
  }
  
  public function executeConfirm(sfWebRequest $request)
  {
    $this->user = $this->getUser()->getDetails();
    $this->forward404Unless($this->teacher = $this->getUser()->getAttribute('teacher'));
    $this->forward404Unless($teacher = Doctrine_Core::getTable('Teacher')->find(array($this->user->getId())), sprintf('Object newsletter does not exist (%s).', $request->getParameter('id')));
    
		if ($request->isMethod('post'))
			{
			  $salt = sfConfig::get('app_system_salt');
        $password = md5(md5($this->teacher['password']).$salt);
        $activation = md5(md5(time()).$salt);
              
        
        $teacher->setEmail($this->teacher['email']);
        $teacher->setPassword($password);
        $teacher->save();
        
        $this->redirect('@teacher-account-settings');
			}
			
		/*$this->redirect('@new-newsletter-message');	*/
  }
  
}