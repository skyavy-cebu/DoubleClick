<?php

/**
 * newsletter actions.
 *
 * @package    DOUBLECLICK
 * @subpackage newsletter
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */


class newsletterActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('Newsletter', sfConfig::get('app_delivered_newsletters_limit'));
    $this->pager->setQuery(NewsletterTable::getInstance()->getDeliveredNewsletters($this->getUser()->getDetails()->getId()));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->newsletter = $this->getRoute()->getObject();
  }

   public function executeNew(sfWebRequest $request)
  {
    $this->user = $this->getUser()->getDetails();

    $newsletter = new Newsletter();
    $newsletter->setTeacherId($this->user->getId());
    
    $this->form = new NewsletterForm($newsletter);
    
    if ($request->isMethod('post'))
    {
      $newsletter = $request->getParameter($this->form->getName());
      $this->form->bind($newsletter);
      
      if ($this->form->isValid())
      {
        $this->getUser()->setAttribute('newsletter', $newsletter);
        $this->redirect('@newsletter-confirm');
      }
    }
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($newsletter = Doctrine_Core::getTable('Newsletter')->find(array($request->getParameter('id'))), sprintf('Object newsletter does not exist (%s).', $request->getParameter('id')));
    $this->form = new NewsletterForm($newsletter);

    /*$this->processForm($request, $this->form);*/

    $this->setTemplate('edit');
	$this->redirect('@newsletter-confirm');
  }
  
  public function executeConfirm(sfWebRequest $request)
  {
    $this->user = $this->getUser()->getDetails();
    $this->forward404Unless($this->newsletter = $this->getUser()->getAttribute('newsletter'));

		if ($request->isMethod('post'))
			{
            
			 $this->user = $this->getUser()->getDetails();
       
       $newsletter = new Newsletter();
       $newsletter->setTeacherId($this->user->getId());
       $newsletter->setTitle($this->newsletter['title']);
       $newsletter->setContent($this->newsletter['content']);
       $newsletter->save();
       $this->subscribestudents = Doctrine_Core::getTable('Student')->getSubscribedToTeacherNewsletter($this->user->getId());
   
      foreach($this->subscribestudents as $i => $student){

        $newsletterx = new NewsletterXStudent();
        $newsletterx->setNewsletterId($newsletter->getId());
        $newsletterx->setStudentId($student->getId());
        $newsletterx->save();
        
        $this->redirect('@new-newsletter-message');
      }
              
    }
			
  }

}
