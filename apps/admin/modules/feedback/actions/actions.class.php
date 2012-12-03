<?php

/**
 * feedback actions.
 *
 * @package    DOUBLECLICK
 * @author     Maria Teresa A. Abesa
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class feedbackActions extends sfActions
{
   
   public function executeIndex(sfWebRequest $request)
  {
    $this->feedbacks = Doctrine_Core::getTable('Feedback')->getFeedbacks();
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->cust_feedback = Doctrine_Core::getTable('Feedback')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->cust_feedback);
  }

  public function executeNew(sfWebRequest $request)
  {
	
    $this->form = new FeedbackForm();

	if ($request->isMethod('post'))
    {
      $feedback = $request->getParameter($this->form->getName());
      $this->form->bind($feedback);
      
      if ($this->form->isValid())
      {
	   // save new Feedback
	   
      $cust_feedback = new Feedback();
      $cust_feedback->setPublishDate(date('Y-m-d H:i:s', strtotime($feedback['publish_date'])));
      $cust_feedback->setCustomerName($feedback['customer_name']);
	    $cust_feedback->setBody($feedback['body']);
      $cust_feedback->save();
      
      $this->redirect('@feedbacks');
      }
     
    }
     
  }
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($cust_feedback = Doctrine_Core::getTable('Feedback')->find(array($request->getParameter('id'))), sprintf('Object feedback does not exist (%s).', $request->getParameter('id')));
    $cust_feedback->delete();

    $this->redirect('@feedbacks');
  }
 
  public function executeEdit(sfWebRequest $request)
  {
   $this->cust_feedback = Doctrine_Core::getTable('Feedback')->find(array($request->getParameter('id')));
   $data = array( 'publish_date' => $this->cust_feedback['publish_date'], 'customer_name' => $this->cust_feedback['customer_name'], 'body' => $this->cust_feedback['body']);
    
   $this->form = new FeedbackForm($data);
   
   
   if ($request->isMethod('post'))
    {
      $feedback = $request->getParameter($this->form->getName());
      $this->form->bind($feedback);
      
      if ($this->form->isValid())
      {
	   
      $this->cust_feedback->setPublishDate(date('Y-m-d H:i:s', strtotime($feedback['publish_date'])));
      $this->cust_feedback->setCustomerName($feedback['customer_name']);
	    $this->cust_feedback->setBody($feedback['body']);
      $this->cust_feedback->save();
      
      $this->redirect('@feedbacks');
      }
    }
	 
	
  }
  
   public function executeTest(sfWebRequest $request)
  {
    
  }
}
