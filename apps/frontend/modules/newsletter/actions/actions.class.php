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
		$this->newsletter = $this->getRoute()->getObject();
    $this->form = new NewsletterForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->user = $this->getUser()->getDetails();
    
    $newsletter = new Newsletter();
    $newsletter->setTeacherId($this->user->getId());
    
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new NewsletterForm($newsletter);

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($newsletter = Doctrine_Core::getTable('Newsletter')->find(array($request->getParameter('id'))), sprintf('Object newsletter does not exist (%s).', $request->getParameter('id')));
    $this->form = new NewsletterForm($newsletter);
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

  /*public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($newsletter = Doctrine_Core::getTable('Newsletter')->find(array($request->getParameter('id'))), sprintf('Object newsletter does not exist (%s).', $request->getParameter('id')));
    $newsletter->delete();

    $this->redirect('newsletter/index');
  }*/

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $newsletter = $form->save();

      /*$this->redirect('newsletter/edit?id='.$newsletter->getId());*/
	  
    }
  }
  public function executeConfirm(sfWebRequest $request)
  {
		/*$this->newsletter = $this->getRoute()->getObject();*/
		
		if ($request->isMethod('post'))
			{
			$this->processForm($request, $this->form);
			}
			
		$this->redirect('@new-newsletter-message');	
  }
  
}
