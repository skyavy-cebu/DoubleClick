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
    // Students with active status only
    $this->pager->setQuery(StudentTable::getInstance()->getSubscribedToTeacherQuery($this->getUser()->getDetails()->getId(), $searchStudentParams + array('status' => 1)));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
   public function executeTeacherDetails(sfWebRequest $request)
  {
    $this->teacher = Doctrine_Core::getTable('Teacher')->find(array($request->getParameter('id')));
  }
      
  /* Teacher's account settings*/
    public function executeAccountSettings(sfWebRequest $request)
  {
    $this->user = $this->getUser()->getDetails();

    $this->forward404Unless($teacher = Doctrine_Core::getTable('teacher')->find(array($this->user->getId()/*$request->getParameter('id')*/)), sprintf('Object newsletter does not exist (%s).', $request->getParameter('id')));
	  
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
			
  }
  
   /* Teacher's Portfolio*/
  
  public function executePortfolio(sfWebRequest $request)
  {
    
    $this->user = $this->getUser()->getDetails();
    $this->forward404Unless($portfolio = Doctrine_Core::getTable('Teacher')->find(array($this->user->getId())), sprintf('Object portfolio does not exist (%s).', $request->getParameter('id')));
    $this->form = new TeacherForm($portfolio);
    $this->portfolio = $this->getRoute()->getObject();
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($portfolio = Doctrine_Core::getTable('Teacher')->find(array($request->getParameter('id'))), sprintf('Object portfolio does not exist (%s).', $request->getParameter('id')));
    $this->form = new TeacherForm($portfolio);

    $this->processForm($request, $this->form);

    $this->setTemplate('portfolio');
  }
  
   protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $portfolio = $form->save();

      $this->redirect('@teacher-portfolio');
	  
    }
  }
  
}