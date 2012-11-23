<?php

/**
 * student actions.
 *
 * @package    DOUBLECLICK
 * @subpackage student
 * @author     Jane Lois E. de Veyra
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class settingsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeAccountSettings(sfWebRequest $request)
  {
   
		$this->user = $this->getUser()->getAdmin();

    $this->forward404Unless($admin = Doctrine_Core::getTable('admin')->find(array($this->user->getId()/*$request->getParameter('id')*/)), sprintf('Object newsletter does not exist (%s).', $request->getParameter('id')));
	  
    $this->form = new AccountSettingsAdminForm();
    
    if ($request->isMethod('post'))
    {
      $accountSettings = $request->getParameter($this->form->getName());
      $this->form->bind($accountSettings);
      
      if ($this->form->isValid())
      {
        $salt = sfConfig::get('app_system_salt');
        $password = md5(md5($accountSettings['password']).$salt);
        $activation = md5(md5(time()).$salt);
				
				$admin->setName($accountSettings['name']);
        $admin->setPassword($password);
				$admin->save();
      }
    }
 
  }
  
}
