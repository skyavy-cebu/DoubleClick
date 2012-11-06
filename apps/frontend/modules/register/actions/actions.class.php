<?php

/**
 * register actions.
 *
 * @package    DOUBLECLICK
 * @subpackage register
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registerActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward404Unless($request->isMethod('post'));
    //$this->setLayout('layoutRegister');
    
    //echo $this->getUser()->getCulture();
    
    $this->form = new RegisterForm();
    
    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('register'));
      
      if ($this->form->isValid())
      {
        //$this->redirect('contact/thankyou?'.http_build_query($this->form->getValues()));
      }
    }
  }
}
