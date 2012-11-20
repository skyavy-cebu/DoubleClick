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
    
    $this->students = $this->getUser()->getDetails()->getSubscribedStudents(sfConfig::get('app_student_search_limit'));
  }
}