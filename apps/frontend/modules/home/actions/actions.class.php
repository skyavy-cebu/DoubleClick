<?php

/**
 * home actions.
 *
 * @package    DOUBLECLICK
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->loginForm = new LoginForm();
    $this->teacherslist = Doctrine_Core::getTable('Teacher')->getTeachers();
  }
}
