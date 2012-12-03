<?php

/**
 * contact actions.
 *
 * @package    DOUBLECLICK
 * @subpackage contact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new InquiryForm();
    
    if ($request->isMethod('post'))
    {
      $inquiry = $request->getParameter($this->form->getName());
      $this->form->bind($inquiry);
      
      if ($this->form->isValid())
      {
        $this->getUser()->setAttribute('contact', $inquiry);
        $this->redirect('@contact-confirm');
      }
    }
  }
  
  public function executeConfirm(sfWebRequest $request)
  {
    $this->forward404Unless($this->contact = $this->getUser()->getAttribute('contact'));
    
     if ($request->isMethod('post'))
    {
            // send mail
      $message = $this->getMailer()->compose(
        /* from */
         $this->contact['email'],
        /* to */
        sfConfig::get('app_contact_email'),
        /* subject */
         sfConfig::get('app_contact_subject'),
        /* body */
        
<<<EOF
{$this->contact['inquiry']}

-------------------------------
DoubleClick
{$this->getController()->genUrl('@home', true)}
EOF
      );
      
      $this->getMailer()->send($message);
      
      /* destroy session variable: contact */
      $this->getUser()->getAttributeHolder()->remove('contact');
      
      // redirect
      $this->redirect('@contact');
    }
  
  }
}
