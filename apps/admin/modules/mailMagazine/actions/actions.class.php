<?php

/**
 * feedback actions.
 *
 * @package    DOUBLECLICK
 * @author     Maria Teresa A. Abesa
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mailMagazineActions extends sfActions
{
   
   public function executeIndex(sfWebRequest $request)
  {
    $this->mailmagazines = Doctrine_Core::getTable('Mailmagazine')->getMailmagazines();
  }
	
	 public function executePastMailmagazine(sfWebRequest $request)
  {
    $this->pastmailmagazines = Doctrine_Core::getTable('Mailmagazine')->getPastMailmagazines();
  }
  
	public function executeShowPastMailmagazine(sfWebRequest $request)
  {
    $this->pastmailmagazine = Doctrine_Core::getTable('Mailmagazine')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->pastmailmagazine);
  }
	
  public function executeShow(sfWebRequest $request)
  {
    $this->mailmagazine = Doctrine_Core::getTable('Mailmagazine')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->mailmagazine);
  }

  public function executeNew(sfWebRequest $request)
  {
	
    $this->form = new MailmagazineForm();

	if ($request->isMethod('post'))
    {
      $magazine = $request->getParameter($this->form->getName());
      $this->form->bind($magazine);
			$a= (date('H:i:s',strtotime($magazine['publish_time'])));
			$b=(date('Y-m-d',strtotime($magazine['publish_date'])));
			//print(((date('Y-m-d',strtotime($magazine['publish_date']))). ' ' .(date('H:i:s',strtotime($magazine['publish_time'])))));
     // var_dump(date('H:i:s',strtotime($magazine['publish_time'])));
			//var_dump(date('Y-m-d',strtotime($magazine['publish_date'])));
		//	var_dump($c);
		//	exit;
      if ($this->form->isValid())
      {
	   // save new Feedback
	   
      $mailmagazine = new Mailmagazine();
      $mailmagazine->setPublishDate((date('Y-m-d',strtotime($magazine['publish_date']))). ' ' .(date('H:i:s',strtotime($magazine['publish_time']))));
      $mailmagazine->setTitle($magazine['title']);
	    $mailmagazine->setContent($magazine['content']);
      $mailmagazine->save();
      
      $this->redirect('mailMagazine/index');
      }
     
    }
     
  }
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($mailmagazine = Doctrine_Core::getTable('Mailmagazine')->find(array($request->getParameter('id'))), sprintf('Object mailmagazine does not exist (%s).', $request->getParameter('id')));
    $mailmagazine->delete();

    $this->redirect('mailMagazine/index');
  }
 
  public function executeEdit(sfWebRequest $request)
  {
   $this->mailmagazine = Doctrine_Core::getTable('Mailmagazine')->find(array($request->getParameter('id')));
   $data = array( 'publish_date' => $this->mailmagazine['publish_date'], 'title' => $this->mailmagazine['title'], 'content' => $this->mailmagazine['content']);
    
   $this->form = new MailmagazineForm($data);
   
   
   if ($request->isMethod('post'))
    {
      $magazine = $request->getParameter($this->form->getName());
      $this->form->bind($magazine);
      
      if ($this->form->isValid())
      {
	   
      $this->mailmagazine->setPublishDate(date('Y-m-d H:i:s', strtotime($magazine['publish_date'])));
      $this->mailmagazine->setTitle($magazine['title']);
	    $this->mailmagazine->setContent($magazine['content']);
      $this->mailmagazine->save();
      
      $this->redirect('mailMagazine/index');
      }
    }
	
  }

}
