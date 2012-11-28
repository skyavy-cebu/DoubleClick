<?php

/**
 * auth actions.
 *
 * @package    DOUBLECLICK
 * @subpackage auth
 * @author     Jane Lois E. de Veyra
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class authActions extends sfActions
{
  /**
   * Executes login action
   *
   * @param sfRequest $request A request object
   */
  public function executeLogin(sfWebRequest $request)
  {
    if ($this->getUser()->isAuthenticated())
    {
      $this->redirect('@students');
    }
    
    $this->form = new LoginForm(null, array('userType' => 'admin'));
    
    if ($request->isMethod('post'))
    {
      $login = $request->getParameter($this->form->getName());
      $this->form->bind($login);
      
      if ($this->form->isValid())
      {
        $this->getUser()->signIn(AdminTable::getInstance()->findOneByEmail($login['email'])->getId());
        
        $this->redirect('@students');
      }
    }
  }
  
  /**
   * Executes logout action
   *
   * @param sfRequest $request A request object
   */
  public function executeLogout(sfWebRequest $request)
  {
    $this->forward404Unless($this->getUser()->isAuthenticated());
    
    $this->getUser()->signOut();
    
    $this->redirect('@home');
  }
}
